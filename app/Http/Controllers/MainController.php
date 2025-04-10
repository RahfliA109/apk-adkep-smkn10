<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    // ==================== TESTING ====================
    public function test()
    {
        return view('testing.test');
    }
    // ==================== AUTHENTICATION ====================
    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if (Session::has('user')) {
            return redirect()->route('dashboard');
        }
        return view('login.login');
    }

    public function lupa()
    {
        return view('login.lupapw'); // menyesuaikan dengan lokasi blade kamu
    }
    
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);


        Log::info('Login attempt for NIP: ' . $request->nuptk_nip);

        $user = DB::table('user')->where('nuptk_nip', $request->nuptk_nip)->first();

        if (!$user) {
            Log::warning('User not found with NIP: ' . $request->nuptk_nip);
            return back()->with('error', 'NIP atau password salah')->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Password mismatch for user: ' . $user->nuptk_nip);
            return back()->with('error', 'NIP atau password salah')->withInput();
        }

        // Set session
        Session::put('user', $user);
        Log::info('Login successful for user: ' . $user->nuptk_nip);

        return redirect()->route('dashboard')->with('success', 'Login berhasil');
    }

    public function logout()
    {
        $user = Session::get('user');
        Session::forget('user');
        Session::flush();
        Log::info('User logged out: ' . ($user->nuptk_nip ?? 'Unknown'));
        return redirect()->route('login')->with('success', 'Anda telah logout');
    }

    public function registrasi()
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
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::table('user')->insert([
            'nama' => $request->nama,
            'nuptk_nip' => $request->nuptk_nip,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info('New user registered: ' . $request->nuptk_nip);
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
>>>>>>> 0667946f2d9a213c95484e8fa993eb3c6ab1b964
    }

    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        if (!Session::has('user')) {
            Log::warning('Unauthorized access attempt to dashboard');
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Session::get('user');
        Log::info('Dashboard accessed by: ' . $user->nuptk_nip);

        $data = [
            'totalUsers' => DB::table('user')->count(),
            'totalBiodata' => DB::table('datadiri')->where('nuptk_nip', $user->nuptk_nip)->count(),
            'user' => $user
        ];

        return view('konten.dashboard', compact('data'));
    }

    // ==================== BIODATA ====================
    public function datadiri()
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        $data = DB::table('datadiri')->where('nuptk_nip', $user->nuptk_nip)->first();

        if ($data) {
            return redirect()->route('datadiri.hasil', ['id' => $data->id]);
        }

        return view('konten.datadiri', ['data' => null]);
    }

    public function store(Request $request)
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nuptk_nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'foto' => 'required|image|mimes:jpg,jpeg|max:2048',
            'scan_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Handle file uploads
        $fotoPath = $request->file('foto')->store('foto', 'public');
        $ktpPath = $request->file('scan_ktp')->store('ktp', 'public');

        $id = DB::table('datadiri')->insertGetId([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'nuptk_nip' => $validated['nuptk_nip'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'status_kawin' => $validated['status_kawin'],
            'alamat_ktp' => $validated['alamat_ktp'],
            'no_hp' => $validated['no_hp'],
            'email' => $validated['email'],
            'foto' => $fotoPath,
            'scan_ktp' => $ktpPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info('Biodata created for user: ' . $user->nuptk_nip);
        return redirect()->route('datadiri.hasil', ['id' => $id])->with('success', 'Biodata berhasil disimpan');
    }

    public function hasil(Request $request)
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        $id = $request->query('id');
        $data = DB::table('datadiri')->where('id', $id)->first();

        if (!$data) {
            return redirect()->route('datadiri')->with('error', 'Data tidak ditemukan');
        }

        // Verifikasi bahwa data milik user yang login
        if ($data->nuptk_nip !== $user->nuptk_nip) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke data ini');
        }

        return view('konten.output_biodata', compact('data'));
    }

    public function editDatadiri($id)
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        $data = DB::table('datadiri')->where('id', $id)->first();

        // Verifikasi kepemilikan data
        if (!$data || $data->nuptk_nip !== $user->nuptk_nip) {
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan atau tidak memiliki akses');
        }

        return view('konten.edit_datadiri', compact('data'));
    }

    public function updateDatadiri(Request $request, $id)
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        // Verifikasi kepemilikan data sebelum update
        $data = DB::table('datadiri')->where('id', $id)->first();
        if (!$data || $data->nuptk_nip !== $user->nuptk_nip) {
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan atau tidak memiliki akses');
        }

        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nuptk_nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg|max:2048',
            'scan_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $updateData = [
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'nuptk_nip' => $validated['nuptk_nip'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'status_kawin' => $validated['status_kawin'],
            'alamat_ktp' => $validated['alamat_ktp'],
            'no_hp' => $validated['no_hp'],
            'email' => $validated['email'],
            'updated_at' => now(),
        ];

        // Handle file uploads jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($data->foto) {
                Storage::disk('public')->delete($data->foto);
            }
            $updateData['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('scan_ktp')) {
            // Hapus scan ktp lama jika ada
            if ($data->scan_ktp) {
                Storage::disk('public')->delete($data->scan_ktp);
            }
            $updateData['scan_ktp'] = $request->file('scan_ktp')->store('ktp', 'public');
        }

        DB::table('datadiri')->where('id', $id)->update($updateData);

        Log::info('Biodata updated for user: ' . $user->nuptk_nip);
        return redirect()->route('datadiri.hasil', ['id' => $id])->with('success', 'Biodata berhasil diperbarui');
    }

    public function deleteDatadiri($id)
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        // Verifikasi kepemilikan data sebelum delete
        $data = DB::table('datadiri')->where('id', $id)->first();
        if (!$data || $data->nuptk_nip !== $user->nuptk_nip) {
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan atau tidak memiliki akses');
        }

        // Hapus file yang terkait
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }
        if ($data->scan_ktp) {
            Storage::disk('public')->delete($data->scan_ktp);
        }

        DB::table('datadiri')->where('id', $id)->delete();

        Log::info('Biodata deleted for user: ' . $user->nuptk_nip);
        return redirect()->route('datadiri')->with('success', 'Biodata berhasil dihapus');
    }

  // ==================== MENIKAH ====================
// ==================== MENIKAH ====================
public function menikah()
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    // Cek apakah sudah ada data
    $data = DB::table('riwayat_menikah')->first();

    if ($data) {
        return redirect()->route('menikah.hasil');
    }

    return view('konten.menikah');
}

public function hasilMenikah()
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    $data = DB::table('riwayat_menikah')->first();

    if (!$data) {
        return redirect()->route('menikah.form')->with('error', 'Data belum diisi');
    }

    return view('konten.output_menikah', compact('data'));
}

public function storeMenikah(Request $request)
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    $request->validate([
        'status_perkawinan' => 'required|string|in:Kawin,Belum Kawin,Duda,Janda',
        'tanggal_menikah_cerai' => 'nullable|date',
        'nama_pasangan' => 'nullable|string|max:255',
        'pekerjaan_pasangan' => 'nullable|string|max:255',
        'jumlah_anak' => 'nullable|integer|min:0',
        'akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
    ]);

    $filePath = null;
    if ($request->hasFile('akta_nikah')) {
        $filePath = $request->file('akta_nikah')->store('akta_nikah', 'public');
    }

    // Hapus data lama jika ada
    DB::table('riwayat_menikah')->delete();

    // Simpan data baru
    DB::table('riwayat_menikah')->insert([
        'status_perkawinan' => $request->status_perkawinan,
        'tanggal_menikah_cerai' => $request->tanggal_menikah_cerai,
        'nama_pasangan' => $request->nama_pasangan,
        'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
        'jumlah_anak' => $request->jumlah_anak,
        'akta_nikah' => $filePath,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('menikah.output')->with('success', 'Data riwayat pernikahan berhasil disimpan');
}

public function editMenikah($id)
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    $data = DB::table('riwayat_menikah')->where('id', $id)->first();

    if (!$data) {
        return redirect()->route('menikah.form')->with('error', 'Data tidak ditemukan');
    }

    return view('konten.edit_menikah', compact('data'));
}

public function updateMenikah(Request $request, $id)
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    $request->validate([
        'status_perkawinan' => 'required|string|in:Kawin,Belum Kawin,Duda,Janda',
        'tanggal_menikah_cerai' => 'nullable|date',
        'nama_pasangan' => 'nullable|string|max:255',
        'pekerjaan_pasangan' => 'nullable|string|max:255',
        'jumlah_anak' => 'nullable|integer|min:0',
        'akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
    ]);

    $updateData = [
        'status_perkawinan' => $request->status_perkawinan,
        'tanggal_menikah_cerai' => $request->tanggal_menikah_cerai,
        'nama_pasangan' => $request->nama_pasangan,
        'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
        'jumlah_anak' => $request->jumlah_anak,
        'updated_at' => now(),
    ];

    if ($request->hasFile('akta_nikah')) {
        $data = DB::table('riwayat_menikah')->where('id', $id)->first();
        if ($data->akta_nikah) {
            Storage::disk('public')->delete($data->akta_nikah);
        }
        $updateData['akta_nikah'] = $request->file('akta_nikah')->store('akta_nikah', 'public');
    }

    DB::table('riwayat_menikah')->where('id', $id)->update($updateData);

    return redirect()->route('menikah.output')->with('success', 'Data riwayat pernikahan berhasil diperbarui');
}

public function deleteMenikah($id)
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    $data = DB::table('riwayat_menikah')->where('id', $id)->first();
    if ($data && $data->akta_nikah) {
        Storage::disk('public')->delete($data->akta_nikah);
    }

    DB::table('riwayat_menikah')->where('id', $id)->delete();

    return redirect()->route('menikah.form')->with('success', 'Data riwayat pernikahan berhasil dihapus');
}


// ==================== PENDIDIKAN ====================
public function pendidikan(Request $request)
{
    // Ambil user dari session
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    // Cek apakah pengguna sudah memasukkan riwayat pendidikan berdasarkan ID
    $pendidikan = DB::table('riwayat_pendidikan')->where('id', $user->id)->first();

    if ($request->isMethod('post')) {
        // Jika data pendidikan sudah ada, jangan biarkan pengguna mengirimkan data lagi
        if ($pendidikan) {
            return redirect()->route('konten.pendidikan')->with('error', 'Anda sudah memasukkan riwayat pendidikan sebelumnya.');
        }

        // Validasi inputan
        $validated = $request->validate([
            'jenjang_pendidikan' => 'required|string|max:255',
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'tahun_lulus' => 'required|numeric|min:1900|max:2099',
            'nama_pelatihan' => 'nullable|string|max:255',
            'penyelenggara_pelatihan' => 'nullable|string|max:255',
            'tahun_pelatihan' => 'nullable|numeric|min:1900|max:2099',
            'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'sertifikat_pelatihan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Menangani upload file jika ada
        $ijazahPath = null;
        $sertifikatPath = null;

        if ($request->hasFile('ijazah')) {
            $ijazahPath = $request->file('ijazah')->store('ijazah', 'public');
        }

        if ($request->hasFile('sertifikat_pelatihan')) {
            $sertifikatPath = $request->file('sertifikat_pelatihan')->store('sertifikat_pelatihan', 'public');
        }

        // Menyimpan data ke tabel pendidikan menggunakan query builder
        DB::table('riwayat_pendidikan')->insert([
            'id' => $user->id, // Gunakan ID pengguna
            'jenjang_pendidikan' => $validated['jenjang_pendidikan'],
            'nama_institusi' => $validated['nama_institusi'],
            'jurusan' => $validated['jurusan'],
            'tahun_lulus' => $validated['tahun_lulus'],
            'nama_pelatihan' => $validated['nama_pelatihan'],
            'penyelenggara_pelatihan' => $validated['penyelenggara_pelatihan'],
            'tahun_pelatihan' => $validated['tahun_pelatihan'],
            'ijazah' => $ijazahPath,
            'sertifikat_pelatihan' => $sertifikatPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('konten.pendidikan')->with('success', 'Riwayat Pendidikan berhasil disimpan.');
    }

    return view('konten.pendidikan', ['pendidikan' => $pendidikan]);
}

//==================
public function penugasan()
{
    $user = Session::get('user');
    if (!$user) {
        return redirect()->route('login');
    }

    return view('konten.penugasan');
}

// Menyimpan data penugasan ke database
public function storePenugasan(Request $request)
{
    // Validasi data form
    $validated = $request->validate([
        'nama_sekolah' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'mata_pelajaran' => 'nullable|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'nullable|date',
        'nomor_sk' => 'nullable|string|max:255',
        'status_penugasan' => 'required|string',
        'sk_penugasan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    // Simpan file SK Penugasan jika ada
    if ($request->hasFile('sk_penugasan')) {
        $filePath = $request->file('sk_penugasan')->store('penugasan_files', 'public');
    } else {
        $filePath = null; // Jika tidak ada file yang di-upload
    }

    // Simpan data penugasan ke database menggunakan Query Builder
    DB::table('riwayat_penugasan')->insert([
        'user_id' => $request->session()->get('user')->id, // Misalkan kamu ingin simpan user_id yang login
        'nama_sekolah' => $request->nama_sekolah,
        'jabatan' => $request->jabatan,
        'mata_pelajaran' => $request->mata_pelajaran,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'nomor_sk' => $request->nomor_sk,
        'status_penugasan' => $request->status_penugasan,
        'file_sk' => $filePath,  // Ganti sk_penugasan menjadi file_sk
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect atau memberi feedback setelah berhasil
    return redirect()->route('penugasan.index')->with('success', 'Riwayat penugasan berhasil disimpan');
}
}