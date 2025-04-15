<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Ambil data user yang sedang login atau lempar error jika tidak ditemukan
        $user = Users::findOrFail(Auth::id());

        // Validasi inputan
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'email' => 'required|email',
            'no_handphone' => 'nullable|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update data user
        $user->name = $validated['nama'];
        $user->nip = $validated['nip'] ?? null;
        $user->email = $validated['email'];
        $user->no_handphone = $validated['no_handphone'] ?? null;

        // Upload foto profil jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($user->gambar && Storage::exists($user->gambar)) {
                Storage::delete($user->gambar);
            }

            // Menyimpan file gambar baru ke direktori 'gambar'
            $path = $request->file('gambar')->store('gambar', 'public');
            $user->gambar = $path;
        }

        // Menyimpan perubahan data ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function delete(Request $request)
    {
        // Ambil data pengguna yang sedang login
        $user = Users::findOrFail(Auth::id());

        // Hapus gambar profil jika ada
        if ($user->gambar && Storage::exists($user->gambar)) {
            Storage::delete($user->gambar);
        }

        // Hapus data pengguna dari database
        $user->delete();

        // Logout pengguna setelah akun dihapus
        Auth::logout();

        // Redirect ke halaman utama atau halaman login dengan pesan sukses
        return redirect('/')->with('success', 'Akun Anda telah dihapus.');
    }
}
