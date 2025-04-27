<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\RiwayatMenikah;  // Pastikan model ini sudah ada
use App\Models\RiwayatPendidikan;  // Pastikan model ini sudah ada
use App\Models\RiwayatPenugasan;  // Pastikan model ini sudah ada
use App\Models\Biodata;  // Pastikan model ini sudah ada

class AdminController extends Controller
{
    // Menampilkan form untuk membuat akun admin
    public function createakun()
    {
        return view('admin.create');
    }

    // Menampilkan akun admin dan user
    public function seeuser()
    {
        // Ambil data akun dengan role admin dan user
        $adminAccounts = Users::where('role', 'admin')->get();
        $userAccounts = Users::where('role', 'user')->get();

        // Kirim data ke view
        return view('admin.seeuser', compact('adminAccounts', 'userAccounts'));
    }

    // Menyimpan akun baru dengan role admin
    public function store(Request $request)
{
    try {
        // Validasi input dengan pesan error yang lebih deskriptif
        $validated = $request->validate([
            'nip' => 'required|unique:users,nip|max:18',
            'nama' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'no_handphone' => 'nullable|max:15',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nip.unique' => 'NIP sudah terdaftar dalam sistem',
            'email.unique' => 'Email sudah digunakan',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Hash password sebelum disimpan
        $validated['password'] = Hash::make($request->password);

        // Handle upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Buat nama file unik dengan timestamp
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $imagePath = $request->file('gambar')->storeAs('public/profiles', $fileName);
            $validated['gambar'] = basename($imagePath);
        }

        // Menyimpan data pengguna baru dengan role admin
        $user = Users::create($validated);

        // Log aktivitas pembuatan akun admin
        \Log::info('Akun admin baru dibuat', [
            'creator' => auth()->user() ? auth()->user()->nama : 'System',
            'admin_id' => $user->id,
            'admin_nip' => $user->nip,
            'admin_nama' => $user->nama
        ]);

        return redirect()->route('konten.dashboard')->with('success', 'Akun Admin berhasil dibuat');
    } catch (\Exception $e) {
        // Log error untuk keperluan debugging
        \Log::error('Gagal membuat akun admin: ' . $e->getMessage(), [
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        // Tampilkan pesan error yang user-friendly
        return back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat membuat akun. Silakan coba lagi.');
    }
}

    // Menampilkan akun admin dan user di halaman kelola akun
    public function kelolaAkun()
    {
        // Ambil data akun dengan role 'admin' dan 'user'
        $adminAccounts = Users::where('role', 'admin')->get();
        $userAccounts = Users::where('role', 'user')->get();

        // Kirim data ke view
        return view('admin.kelolaakun', compact('adminAccounts', 'userAccounts'));
    }

    // Menghapus akun
    public function hapus($id)
    {
        $user = users::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus');
    }

    // Menampilkan detail akun user dan data terkait
    public function lihat($id)
    {
        $user = Users::findOrFail($id);

        // Ambil data terkait user ini dari berbagai model
        $biodata = Biodata::where('user_id', $id)->first(); // Menggunakan model Biodata
        $riwayatMenikah = RiwayatMenikah::where('user_id', $id)->first(); // Menggunakan model RiwayatMenikah
        $pendidikan = RiwayatPendidikan::where('user_id', $id)->first(); // Menggunakan model RiwayatPendidikan
        $penugasan = RiwayatPenugasan::where('user_id', $id)->first(); // Menggunakan model RiwayatPenugasan

        return view('admin.detailuser', compact('user', 'biodata', 'riwayatMenikah', 'pendidikan', 'penugasan'));
    }


            
        // In your AdminController.php or similar controller
public function search(Request $request)
{
    $keyword = $request->input('keyword');
    
    // Initialize with empty collections to avoid undefined variable errors
    $adminAccounts = collect([]);
    $userAccounts = collect([]);
    
    // Apply search if keyword exists
    if ($keyword) {
        $adminAccounts = users::where('role', 'admin')
            ->where('nama', 'LIKE', "%{$keyword}%")
            ->get();
            
        $userAccounts = users::where('role', 'user')
            ->where('nama', 'LIKE', "%{$keyword}%")
            ->get();
    } else {
        // If no keyword, get all accounts
        $adminAccounts = users::where('role', 'admin')->get();
        $userAccounts = users::where('role', 'user')->get();
    }
    
    // Pass the variables to the view
    return view('admin.seeuser', compact('adminAccounts', 'userAccounts','keyword'));
}



    
}
