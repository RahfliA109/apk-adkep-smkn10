<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;
use App\Models\RiwayatMenikah;


class MainController extends Controller
{
    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function lupapw(Request $request)
    {
        // Simpan session untuk menandakan ini halaman lupa password login
        $request->session()->put('from', 'login');
    
        return view('auth.lupapw'); // Tampilkan halaman lupa password untuk login
    }

    public function lupapw2(Request $request)
    {
        // Simpan session untuk menandakan ini halaman lupa password profil
        $request->session()->put('from', 'profil');
        
        return view('auth.lupapw2'); // Tampilkan halaman lupa password untuk profil
    }


    public function back(){
        return view('konten.dashboard');
    }

    public function back2(){
        return view('auth.index');
    }

    public function profil(){
    
        return view('konten.profil');
    }

    public function test()
    {
        return view('users.biodata.outputB');
    }

    public function test2()
    {
        return view('konten.datadiri');
    }

    public function dashboard()
    {
        return view('konten.dashboard');
    }

    public function biodata()
    {
        $user = Auth::user();
        $biodata = Biodata::where('email', $user->email)->first();

        if ($biodata) {
            // Redirect ke output jika sudah mengisi biodata
            return redirect()->route('biodata.output')->with('info', 'Anda sudah mengisi biodata.');
        }

        // Tampilkan form input biodata
        return view('users.biodata.biodata');
    }

    public function menikah() 
{
    $user = Auth::user();
    // Ambil data riwayat menikah hanya untuk user yang sedang login
    $riwayatMenikah = RiwayatMenikah::where('user_id', auth()->id())->first();
    
    // Jika user sudah memiliki data
    if ($riwayatMenikah) {
        // Arahkan ke halaman output
        return redirect()->route('riwayatMenikah.output',compact('riwayatMenikah'));
    }
    
    // Jika user belum memiliki data, arahkan ke form input
    return redirect()->route('riwayatMenikah.create');
}

    public function penugasan()
    {
        return view('users.penugasan.penugasan');
    }

    public function pendidikan()
    {
        return view('users.pendidikan.pendidikan');
    }
}
