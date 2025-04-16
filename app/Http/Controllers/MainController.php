<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function registrasi(){
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


    public function test(){
        return view('users.biodata.outputB');
    }

    public function test2(){
        return view('konten.datadiri');
    }

    public function dashboard(){
        return view('konten.dashboard');
    }

    public function datadiri(){
        return view('users.biodata.biodata');
    }

    public function menikah(){
        return view('users.menikah.menikah');
    }

    public function penugasan(){
        return view('users.penugasan.penugasan');
    }

    public function pendidikan(){
        return view('users.pendidikan.pendidikan');
    }


}