<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

class MainController extends Controller
{
    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function lupapw()
    {
        return view('auth.lupapw'); 
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
        $data = \App\Models\RiwayatMenikah::where('user_id', $user->id)->first();
    
        if ($data) {
            return redirect()->route('riwayatMenikah.index')->with('info', 'Anda sudah mengisi data riwayat menikah.');
        }
    
        return view('users.menikah.menikah');
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
