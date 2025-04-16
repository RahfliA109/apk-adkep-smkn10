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
            'nuptk_nip' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string',
            'status_kawin' => 'required|string',
            'alamat_ktp' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'scan_ktp' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('scan_ktp')) {
            $validated['scan_ktp'] = $request->file('scan_ktp')->store('scan_ktp', 'public');
        }

        $validated['email'] = $user->email;

        Biodata::create($validated);

        return redirect()->route('biodata.output')->with('success', 'Data berhasil disimpan!');
    }

    public function output()
    {
        $user = Auth::user();
        $biodata = Biodata::where('email', $user->email)->first();

        if (!$biodata) {
            return view('konten.datadiri', ['message' => 'Silakan isi biodata Anda.']);
        }

        return view('users.biodata.outputB', compact('biodata'));
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);

        // Opsional: Cek agar hanya user terkait yang bisa edit
        if ($biodata->email !== Auth::user()->email) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        return view('users.biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        $biodata = Biodata::findOrFail($id);

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
            'foto' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'scan_ktp' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('scan_ktp')) {
            if ($biodata->scan_ktp && Storage::disk('public')->exists($biodata->scan_ktp)) {
                Storage::disk('public')->delete($biodata->scan_ktp);
            }
            $validated['scan_ktp'] = $request->file('scan_ktp')->store('scan_ktp', 'public');
        }

        $biodata->update($validated);

        return redirect()->route('biodata.output')->with('success', 'Data berhasil diperbarui!');
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
}
