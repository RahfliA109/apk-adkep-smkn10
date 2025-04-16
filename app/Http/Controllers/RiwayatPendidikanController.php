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
        $data = RiwayatPendidikan::where('user_id', Auth::id())->first();
        if ($data) {
            return view('users.pendidikan.outputP', compact('data'));
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

        $data = $request->except(['_token']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('ijazah')) {
            $data['ijazah'] = $request->file('ijazah')->store('dokumen/ijazah', 'public');
        }

        if ($request->hasFile('sertifikat_pelatihan')) {
            $data['sertifikat_pelatihan'] = $request->file('sertifikat_pelatihan')->store('dokumen/sertifikat', 'public');
        }

        RiwayatPendidikan::create($data);

        return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil disimpan!');
    }

    // Menampilkan form edit jika data sudah ada
    public function edit()
{
    $pendidikan = RiwayatPendidikan::where('user_id', Auth::id())->firstOrFail();
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

    $data = RiwayatPendidikan::where('user_id', Auth::id())->findOrFail($id);
    $input = $request->except(['_token', '_method']);

    if ($request->hasFile('ijazah')) {
        $input['ijazah'] = $request->file('ijazah')->store('dokumen/ijazah', 'public');
    }

    if ($request->hasFile('sertifikat_pelatihan')) {
        $input['sertifikat_pelatihan'] = $request->file('sertifikat_pelatihan')->store('dokumen/sertifikat', 'public');
    }

    $data->update($input);

    return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil diperbarui.');
}


    // Menghapus data pendidikan milik user
public function destroy($id)
{
    $data = RiwayatPendidikan::where('user_id', Auth::id())->findOrFail($id);

    if ($data) {
        $data->delete();
        return redirect()->route('riwayatPendidikan.index')->with('success', 'Data berhasil dihapus.');
    }

    return redirect()->route('riwayatPendidikan.index')->with('error', 'Data tidak ditemukan.');
}

}
