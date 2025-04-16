<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class PasswordController extends Controller
{
    // Langkah 1: Cek apakah email terdaftar
    public function cekEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = Users::where('email', $request->email)->first();

        if ($user) {
            return view('auth.lupapw', ['email' => $request->email]);
        } else {
            return back()->with('error', 'Email tidak ditemukan.');
        }
    }

    // Langkah 2: Simpan password baru
    public function simpanPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Cari user berdasarkan email
        $user = Users::where('email', $request->email)->first();

        // Update password
        $user->password = \Hash::make($request->password);
        $user->save();

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->to(url()->previous())->with('success', 'Password berhasil diubah.');
    }


}
