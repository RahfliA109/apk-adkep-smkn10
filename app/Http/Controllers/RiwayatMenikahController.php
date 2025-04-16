<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatMenikah;

class RiwayatMenikahController extends Controller
{
    public function index()
    {
        $data = RiwayatMenikah::where('user_id', Auth::id())->first();

        if ($data) {
            return view('users.menikah.outputM', compact('data'));
        }

        return view('users.menikah.menikah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_perkawinan' => 'required',
            'tanggal_menikah_cerai' => 'nullable|date',
            'akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        // Cegah duplikat input
        if (RiwayatMenikah::where('user_id', Auth::id())->exists()) {
            return redirect()->route('riwayatMenikah.index')->with('error', 'Data sudah pernah diisi.');
        }

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('akta_nikah')) {
            $data['akta_nikah'] = $request->file('akta_nikah')->store('akta', 'public');
        }

        RiwayatMenikah::create($data);

        return redirect()->route('riwayatMenikah.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit()
    {
        $data = RiwayatMenikah::where('user_id', Auth::id())->firstOrFail();
        return view('users.menikah.edit_menikah', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'status_perkawinan' => 'required',
            'tanggal_menikah_cerai' => 'nullable|date',
            'akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $data = RiwayatMenikah::where('user_id', Auth::id())->firstOrFail();
        $input = $request->all();

        if ($request->hasFile('akta_nikah')) {
            $input['akta_nikah'] = $request->file('akta_nikah')->store('akta', 'public');
        }

        $data->update($input);

        return redirect()->route('riwayatMenikah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy()
    {
        $data = RiwayatMenikah::where('user_id', Auth::id())->first();
        if ($data) {
            $data->delete();
            return redirect()->route('riwayatMenikah.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('riwayatMenikah.index')->with('error', 'Data tidak ditemukan.');
    }
}
