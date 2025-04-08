<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    //INI UNTUK TESTING
    public function test(){
        return view('testing.test');
    }

    //LOGIN SETTING
    public function index(){
        return view('login.login');
    }

    public function registrasi(){
        return view('login.registrasi');
    }

    //TESTING MASUK LOGIN 
    public function masuk(){
        return view('konten.dashboard');
    }

    //KONTEN
    public function pendidikan(){
        return view('konten.pendidikan');
    }

    public function penugasan(){
        return view('konten.penugasan');
    }

    public function datadiri(){

        return view('konten.datadiri');
    }

    public function store(Request $request)
    {
        // Validasi sederhana
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nuptk_nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg|max:2048',
            'scan_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('scan_ktp')) {
            $validated['scan_ktp'] = $request->file('scan_ktp')->store('ktp', 'public');
        }

        // Simpan ke database
        $id = DB::table('datadiri')->insertGetId($validated);

        // Redirect ke halaman hasil
        return redirect()->route('datadiri.hasil', ['id' => $id]);
    }

    public function hasil(Request $request)
    {
        $id = $request->query('id');

        $data = DB::table('datadiri')->where('id', $id)->first();

        return view('konten.output_biodata', compact('data'));
    }



    public function menikah(){
        return view('konten.menikah');
    }

    public function dashboard()
    {
        // Data dummy
        $data = [
            'totalUsers' => 1200,
            'totalSales' => 3500,
            'totalRevenue' => 50000,
        ];

        return view('konten.dashboard', compact('data'));
    }
}
