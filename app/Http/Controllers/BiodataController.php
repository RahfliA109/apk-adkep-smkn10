<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Cek apakah pengguna sudah mengisi biodata
        $existingBiodata = Biodata::where('email', $user->email)->first();
        if ($existingBiodata) {
            return redirect()->route('biodata.output')->with('error', 'Anda sudah mengisi biodata.');
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string',
            'status_kawin' => 'required|string',
            'alamat_ktp' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png,webp,pdf,doc,docx|max:5120',
            'scan_ktp' => 'nullable|file|mimes:jpeg,jpg,png,webp,pdf,doc,docx|max:5120',
        ]);

        // Menambahkan user_id
        $validated['user_id'] = $user->id;

        // Simpan foto ke folder storagegambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_foto_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName); // Simpan langsung ke storage/app/public
            $validated['foto'] = 'storage/' . $fileName; // path yang bisa diakses lewat URL
        }
        
        if ($request->hasFile('scan_ktp')) {
            $file = $request->file('scan_ktp');
            $fileName = time() . '_ktp_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['scan_ktp'] = 'storage/' . $fileName;
        }
        

        // Menyimpan biodata dengan user_id
        Biodata::create($validated);

        return redirect()->route('biodata.output')->with('success', 'Data berhasil disimpan!');
    }





    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'status_kawin' => 'required|string',
            'alamat_ktp' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png,webp,pdf,doc,docx|max:5120',
            'scan_ktp' => 'nullable|file|mimes:jpeg,jpg,png,webp,pdf,doc,docx|max:5120',
        ]);

        if (Auth::user()->role === 'admin') {
            // Admin bisa edit siapa saja
            $biodata = Biodata::findOrFail($id);
            $userId = $biodata->user_id ?? null; // Optional, kalau mau redirect ke detail user
        } else {
            // User hanya bisa edit biodatanya sendiri
            $biodata = Biodata::where('id', $id)->where('email', Auth::user()->email)->firstOrFail();
        }

        // Update file foto jika ada
        if ($request->hasFile('foto')) {
            if ($biodata->foto && \Storage::disk('public')->exists($biodata->foto)) {
                \Storage::disk('public')->delete($biodata->foto);
            }
            $fileName = 'foto_' . time() . '_' . $request->file('foto')->getClientOriginalName();
            $validated['foto'] = $request->file('foto')->storeAs('storagegambar', $fileName, 'public');
        }

        // Update scan KTP jika ada
        if ($request->hasFile('scan_ktp')) {
            if ($biodata->scan_ktp && \Storage::disk('public')->exists($biodata->scan_ktp)) {
                \Storage::disk('public')->delete($biodata->scan_ktp);
            }
            $fileName = 'ktp_' . time() . '_' . $request->file('scan_ktp')->getClientOriginalName();
            $validated['scan_ktp'] = $request->file('scan_ktp')->storeAs('storagegambar', $fileName, 'public');
        }

        $biodata->update($validated);

        // Redirect berdasarkan role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('akun.lihat', $userId)->with('success', 'Biodata berhasil diperbarui.');
        } else {
            return redirect()->route('biodata.output')->with('success', 'Data berhasil diperbarui!');
        }
    }





    public function output()
{
    $user = Auth::user();
    $biodata = Biodata::where('email', $user->email)->first();

    if (!$biodata) {
        return view('users.biodata.biodata', ['message' => 'Silakan isi biodata Anda.']);
    }

    return view('users.biodata.outputB', compact('biodata'));
}







    public function edit($id)
    {
        if (Auth::user()->role === 'admin') {
            // Admin bisa akses data siapa saja
            $biodata = Biodata::findOrFail($id);
        } else {
            // User hanya boleh akses data miliknya
            $biodata = Biodata::where('user_id', Auth::id())->findOrFail($id);
        }

        return view('users.biodata.edit', compact('biodata'));
    }





    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        // Opsional: Cek agar hanya user terkait yang bisa hapus
        if ($biodata->email !== Auth::user()->email) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        // Hapus file jika ada
        if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
            Storage::disk('public')->delete($biodata->foto);
        }

        if ($biodata->scan_ktp && Storage::disk('public')->exists($biodata->scan_ktp)) {
            Storage::disk('public')->delete($biodata->scan_ktp);
        }

        $biodata->delete();

        return redirect()->route('biodata.output')->with('success', 'Data berhasil dihapus!');
    }




    // BiodataController.php
    public function preview($filename)
{
    $path = storage_path('app/public/storagegambar/' . $filename);

    // Cek apakah file ada
    if (!file_exists($path)) {
        abort(404, 'File tidak ditemukan.');
    }

    // Cek apakah file gambar atau bukan
    $mimeType = mime_content_type($path);
    
    // Jika file gambar, tampilkan gambar
    if (Str::startsWith($mimeType, 'image')) {
        return response()->file($path);
    }

    // Jika bukan gambar, tampilkan file untuk di-download
    return response()->download($path);
}


}
