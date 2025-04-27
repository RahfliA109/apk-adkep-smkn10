<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|digits:18',
            'password' => 'required|string|max:50',
        ]);

        // Cari user berdasarkan NIP
        $user = Users::where('nip', $request->nip)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Arahkan ke dashboard setelah login
            return redirect()->route('konten.dashboard');
        }

        // Jika gagal login
        return back()->with('error', 'NIP atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.index');
    }
}
