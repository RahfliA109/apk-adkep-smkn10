<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPenugasan;
use Illuminate\Support\Facades\Auth;

class RiwayatPenugasanController extends Controller
{
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

    $data = RiwayatPenugasan::findOrFail($id);

    if ($request->hasFile('sk_penugasan')) {
        $file = $request->file('sk_penugasan');
        $path = $file->store('sk_penugasan', 'public');
        $validated['sk_penugasan'] = $path;
    }

    $data->update($validated);

    return redirect()->route('penugasan.output')->with('success', 'Data berhasil diperbarui.');
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
        $data = RiwayatPenugasan::where('user_id', Auth::id())->get();
        return view('users.penugasan.output', compact('data'));
    }
}

