<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    // ==================== TESTING ====================
    public function test(){
        return view('testing.test');
    }

    // ==================== LOGIN ====================
    public function index(){
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nuptk_nip' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('user')->where('nuptk_nip', $request->nuptk_nip)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'NIP atau password salah');
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login.login');
    }

    public function registrasi(){
        return view('login.registrasi');
    }

    public function masuk(){
        return view('konten.dashboard');
    }

    // ==================== REGISTRASI USER ====================
    public function registerStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nuptk_nip' => 'required|string|max:50|unique:user,nuptk_nip',
            'email' => 'required|email|unique:user,email',
            'no_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        DB::table('user')->insert([
            'nama' => $request->nama,
            'nuptk_nip' => $request->nuptk_nip,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ==================== BIODATA ====================
    public function datadiri(){
        $user = Session::get('user');
        $data = DB::table('datadiri')->where('nuptk_nip', $user->nuptk_nip)->first();
        return view('konten.datadiri', compact('data'));
    }

    public function store(Request $request)
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
