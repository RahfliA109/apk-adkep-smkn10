<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPenugasan;
use Illuminate\Support\Facades\Auth;

class RiwayatPenugasanController extends Controller
{

    public function index()
{
    $penugasan = RiwayatPenugasan::where('user_id', Auth::id())->first();

    if ($penugasan) {
        return redirect()->route('penugasan.output');
    } else {
        return redirect()->route('penugasan.create');
    }
}


    public function create()
    {
        return view('users.penugasan.penugasan');
    }


    public function edit($id)
{
    $data = RiwayatPenugasan::findOrFail($id);
    return view('users.penugasan.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_sekolah' => 'required|string',
        'jabatan' => 'required|string',
        'mata_pelajaran' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'nullable|date',
        'nomor_sk' => 'nullable|string',
        'status_penugasan' => 'required|string',
        'sk_penugasan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    // Admin bisa akses semua data, user hanya datanya sendiri
    if (Auth::user()->role === 'admin') {
        $data = RiwayatPenugasan::findOrFail($id);
        $userId = $data->user_id ?? null;
    } else {
        $data = RiwayatPenugasan::where('user_id', Auth::id())->findOrFail($id);
    }

    // Handle upload file jika ada
    if ($request->hasFile('sk_penugasan')) {
        // Hapus file lama jika ada
        if ($data->sk_penugasan && \Storage::disk('public')->exists($data->sk_penugasan)) {
            \Storage::disk('public')->delete($data->sk_penugasan);
        }

        $path = $request->file('sk_penugasan')->store('sk_penugasan', 'public');
        $validated['sk_penugasan'] = $path;
    }

    // Simpan data
    $data->update($validated);

    // Redirect sesuai role
    if (Auth::user()->role === 'admin') {
        return redirect()->route('akun.lihat', $userId)->with('success', 'Data penugasan berhasil diperbarui.');
    } else {
        return redirect()->route('penugasan.output')->with('success', 'Data berhasil diperbarui.');
    }
}


public function destroy($id)
{
    $data = RiwayatPenugasan::findOrFail($id);
    $data->delete();

    return redirect()->route('penugasan.output')->with('success', 'Data berhasil dihapus.');
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string',
            'jabatan' => 'required|string',
            'mata_pelajaran' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'nomor_sk' => 'nullable|string',
            'status_penugasan' => 'required|string',
            'sk_penugasan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('sk_penugasan')) {
            $file = $request->file('sk_penugasan');
            $path = $file->store('sk_penugasan', 'public');
            $validated['sk_penugasan'] = $path;
        }

        $validated['user_id'] = Auth::id();

        RiwayatPenugasan::create($validated);

        return redirect()->route('penugasan.output')->with('success', 'Riwayat penugasan berhasil disimpan.');
    }

        public function output()
    {
        $penugasan = RiwayatPenugasan::where('user_id', Auth::id())->first();

        if (!$penugasan) {
            return view('users.penugasan.output', ['message' => 'Belum ada data penugasan yang ditambahkan.']);
        }

        return view('users.penugasan.output', compact('penugasan'));
    }


}

