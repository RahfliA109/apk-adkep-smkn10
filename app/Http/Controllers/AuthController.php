<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // ==================== LOGIN ====================
    public function index()
    {
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
        return redirect()->route('login');
    }

    public function registrasi()
    {
        return view('login.registrasi');
    }

    public function lupaPassword()
    {
        return view('login.registrasi');
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
    
        // Simpan data user baru dan ambil ID-nya
        $userId = DB::table('user')->insertGetId([
            'nama' => $request->nama,
            'nuptk_nip' => $request->nuptk_nip,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Ambil data user yang baru didaftarkan
        $user = DB::table('user')->where('id', $userId)->first();
    
        // Login otomatis (simpan ke session)
        Session::put('user', $user);
    
        // Redirect langsung ke dashboard
        return redirect()->route('dashboard')->with('success', 'Selamat datang, akun berhasil dibuat!');
    }
    
    
}


