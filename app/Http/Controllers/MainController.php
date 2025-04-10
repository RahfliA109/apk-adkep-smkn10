<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    // ==================== TESTING ====================
    public function test(){
        return view('testing.test');
    }


    public function kembali(){
        return view('login.login');
    }

    public function lupa()
    {
        return view('login.lupapw'); // menyesuaikan dengan lokasi blade kamu
    }
    
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Sementara tampilkan notifikasi sukses saja
        return back()->with('success', 'Link reset telah dikirim ke email jika tersedia.');
    }
    
    

    // ==================== BIODATA ====================
    public function datadiri()
    {
        $user = Session::get('user');
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        $data = DB::table('datadiri')->where('nuptk_nip', $user->nuptk_nip)->first();
        return view('konten.datadiri', compact('data'));
    }

    public function store(Request $request)
    {
        $user = Session::get('user');
    
        // 🚨 Cek apakah data sudah ada untuk NIP tersebut
        $existing = DB::table('datadiri')->where('nuptk_nip', $user->nuptk_nip)->first();
        if ($existing) {
            return redirect()->route('datadiri')->with('warning', 'Data sudah ada. Silakan edit.');
        }
    
        $validated = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'status_kawin'  => 'required',
            'alamat_ktp'    => 'required',
            'no_hp'         => 'required',
            'email'         => 'required|email',
            'foto'          => 'nullable|image|mimes:jpg,jpeg|max:2048',
            'scan_ktp'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }
    
        if ($request->hasFile('scan_ktp')) {
            $validated['scan_ktp'] = $request->file('scan_ktp')->store('ktp', 'public');
        }
    
        // Gunakan NIP dari session user
        $validated['nuptk_nip'] = $user->nuptk_nip;
    
        $id = DB::table('datadiri')->insertGetId(array_merge(
            $validated,
            ['created_at' => now(), 'updated_at' => now()]
        ));
    
        return redirect()->route('datadiri.hasil', ['id' => $id]);
    }
    

    public function hasil(Request $request)
    {
        $id = $request->query('id');
        $data = DB::table('datadiri')->where('id', $id)->first();
        return view('konten.output_biodata', compact('data'));
    }

    // ==================== EDIT & DELETE BIODATA ====================
    public function editDatadiri($id)
    {
        $data = DB::table('datadiri')->where('id', $id)->first();
        return view('konten.edit_datadiri', compact('data'));
    }

    public function updateDatadiri(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'nuptk_nip'     => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'status_kawin'  => 'required',
            'alamat_ktp'    => 'required',
            'no_hp'         => 'required',
            'email'         => 'required|email',
            'foto'          => 'nullable|image|mimes:jpg,jpeg|max:2048',
            'scan_ktp'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('scan_ktp')) {
            $validated['scan_ktp'] = $request->file('scan_ktp')->store('ktp', 'public');
        }

        DB::table('datadiri')->where('id', $id)->update(array_merge(
            $validated,
            ['updated_at' => now()]
        ));

        return redirect()->route('datadiri')->with('success', 'Biodata berhasil diperbarui.');
    }

    public function deleteDatadiri($id)
    {
        DB::table('datadiri')->where('id', $id)->delete();
        return redirect()->route('datadiri')->with('success', 'Biodata berhasil dihapus.');
    }

    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        $data = [
            'totalUsers'   => 1200,
            'totalSales'   => 3500,
            'totalRevenue' => 50000,
        ];
        return view('konten.dashboard', compact('data'));
    }

    // ==================== MENIKAH ====================
    public function menikah(){
        return view('konten.menikah');
    }

    public function storeMenikah(Request $request)
    {
        $request->validate([
            'status_perkawinan'     => 'required|string',
            'tanggal_menikah_cerai' => 'nullable|date',
            'nama_pasangan'         => 'nullable|string|max:255',
            'pekerjaan_pasangan'    => 'nullable|string|max:255',
            'jumlah_anak'           => 'nullable|integer|min:0',
            'akta_nikah'            => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('akta_nikah')) {
            $filePath = $request->file('akta_nikah')->store('akta_nikah', 'public');
        }

        DB::table('riwayat_menikah')->insert([
            'status_perkawinan'     => $request->status_perkawinan,
            'tanggal_menikah_cerai' => $request->tanggal_menikah_cerai,
            'nama_pasangan'         => $request->nama_pasangan,
            'pekerjaan_pasangan'    => $request->pekerjaan_pasangan,
            'jumlah_anak'           => $request->jumlah_anak,
            'akta_nikah'            => $filePath,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return redirect()->back()->with('success', 'Data riwayat pernikahan berhasil disimpan.');
    }

    // ==================== PENDIDIKAN & PENUGASAN ====================
    public function pendidikan(){
        return view('konten.pendidikan');
    }

    public function penugasan(){
        return view('konten.penugasan');
    }
}
