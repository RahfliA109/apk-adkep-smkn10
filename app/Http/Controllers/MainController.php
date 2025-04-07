<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
        return view('konten.riwayat_pendidikan');
    }

    public function penugasan(){
        return view('konten.riwayat_penugasan');
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

    public function datadiri(){

        return view('konten.datadiri');
    }

    public function sertifikat(){
        return view('konten.sertifikat');
    }



}
