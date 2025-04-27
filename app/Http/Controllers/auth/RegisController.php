<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class RegisController extends Controller
{
    public function registrasi(){
        return view('auth.registrasi');
    }

    public function proses(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:50',
        'nip' => 'required|digits:18|unique:users,nip',
        'email' => 'required|email|max:50|unique:users,email',
        'no_handphone' => 'required|string|max:15',
        'password' => 'required|string|max:50|confirmed',
    ]);

    // Simpan data user
    $user = new Users();
    $user->nama = $request->nama;
    $user->nip = $request->nip;
    $user->email = $request->email;
    $user->no_handphone = $request->no_handphone;
    
    // Hash password sebelum disimpan ke database
    $user->password = Hash::make($request->password); // Gunakan Hash::make untuk meng-hash password

    $user->role = 'user'; 

    $user->save();

    // Redirect ke login
    return redirect()->route('auth.index')->with('success', 'Registrasi berhasil! Silakan login.');
}


}
