<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanController extends Controller
{
    // Menampilkan form input atau output jika data sudah ada
    public function index()
    {
        $pendidikan = RiwayatPendidikan::where('user_id', Auth::id())->first();
        if ($pendidikan) {
            return view('users.pendidikan.outputP', compact('pendidikan'));
        }
        return view('users.pendidikan.pendidikan');
    }

    // Menyimpan data pendidikan baru
    public function store(Request $request)
    {
        $request->validate([
            'jenjang_pendidikan' => 'required',
            'nama_institusi' => 'required',
            'tahun_lulus' => 'required|integer',
            'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'sertifikat_pelatihan' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        if (RiwayatPendidikan::where('user_id', Auth::id())->exists()) {
            return redirect()->route('riwayatPendidikan.index')->with('error', 'Data sudah pernah diisi.');
        }

        $pendidikan = $request->except(['_token']);
        $pendidikan['user_id'] = Auth::id();

        if ($request->hasFile('ijazah')) {
            $pendidikan['ijazah'] = $request->file('ijazah')->store('dokumen/ijazah', 'public');
        }

        if ($request->hasFile('sertifikat_pelatihan')) {
            $pendidikan['sertifikat_pelatihan'] = $request->file('sertifikat_pelatihan')->store('dokumen/sertifikat', 'public');
        }

        RiwayatPendidikan::create($pendidikan);

        return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil disimpan!');
    }

    // Menampilkan form edit jika data sudah ada
    public function edit($id)
{
    if (Auth::user()->role === 'admin') {
        // Admin bisa akses data siapa saja
        $pendidikan = RiwayatPendidikan::findOrFail($id);
    } else {
        // User hanya boleh akses data miliknya
        $pendidikan = RiwayatPendidikan::where('user_id', Auth::id())->findOrFail($id);
    }

    return view('users.pendidikan.edit_riwayatpendidikan', compact('pendidikan'));
}


   // Menyimpan perubahan pada data pendidikan
   public function update(Request $request, $id)
{
    $request->validate([
        'jenjang_pendidikan' => 'required',
        'nama_institusi' => 'required',
        'tahun_lulus' => 'required|integer',
        'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        'sertifikat_pelatihan' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
    ]);
    
    if (Auth::user()->role === 'admin') {
        // Admin bisa mengupdate data siapa saja
        $pendidikan = RiwayatPendidikan::findOrFail($id);
        $userId = $pendidikan->user_id; // Simpan user_id untuk redirect
    } else {
        // User hanya boleh mengupdate data miliknya
        $pendidikan = RiwayatPendidikan::where('user_id', Auth::id())->findOrFail($id);
    }
    
    $input = $request->except(['_token', '_method']);
    
    if ($request->hasFile('ijazah')) {
        $input['ijazah'] = $request->file('ijazah')->store('dokumen/ijazah', 'public');
    }
    
    if ($request->hasFile('sertifikat_pelatihan')) {
        $input['sertifikat_pelatihan'] = $request->file('sertifikat_pelatihan')->store('dokumen/sertifikat', 'public');
    }
    
    $pendidikan->update($input);
    
    // Redirect berdasarkan role
    if (Auth::user()->role === 'admin') {
        // Arahkan admin ke detail user
        return redirect()->route('akun.lihat', $userId)->with('success', 'Data pendidikan berhasil diperbarui.');
    } else {
        // User biasa diarahkan ke halaman pendidikan
        return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil diperbarui.');
    }
}

   

    // Menghapus data pendidikan milik user
    public function destroy($id)
    {
        if (Auth::user()->role === 'admin') {
            // Admin bisa menghapus data siapa saja
            $pendidikan = RiwayatPendidikan::findOrFail($id);
        } else {
            // User hanya boleh menghapus data miliknya
            $pendidikan = RiwayatPendidikan::where('user_id', Auth::id())->findOrFail($id);
        }
        
        if ($pendidikan) {
            $pendidikan->delete();
            return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil dihapus.');
        }
        
        return redirect()->route('riwayatPendidikan.index')->with('error', 'Data tidak ditemukan.');
    }
    
}
