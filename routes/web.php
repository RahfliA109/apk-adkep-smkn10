<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RiwayatMenikahController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\RiwayatPenugasanController;
use App\Http\Controllers\AdminController;



// ==============================
// LOGIN
// ==============================
Route::get('/', [LoginController::class, 'index'])->name('auth.index');
Route::post('/proses', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==============================
// REGISTRASI
// ==============================
Route::get('registrasi', [RegisController::class, 'registrasi'])->name('auth.registrasi');
Route::post('registrasi', [RegisController::class, 'proses'])->name('register.submit');

// ==============================
// LUPA PASSWORD
// ==============================
Route::get('lupapw', [MainController::class, 'lupapw'])->name('lupapw');
Route::get('lupapw2', [MainController::class, 'lupapw2'])->name('lupapw2');

Route::post('/cek-email', [PasswordController::class, 'cekEmail'])->name('password.check');
Route::get('/cek-email', function () {
    return redirect()->route('lupapw');
});

Route::post('/simpan-password', [PasswordController::class, 'simpanPassword'])->name('password.save');

// ==============================
// MEANMPILAN FORM FITUR DAN DASHBOARD
// ==============================
Route::get('dashboard', [MainController::class, 'dashboard'])->name('konten.dashboard');
Route::get('biodata', [MainController::class, 'biodata'])->name('users.biodata.biodata');
Route::get('menikah', [MainController::class, 'menikah'])->name('users.menikah.menikah');
Route::get('pendidikan', [MainController::class, 'pendidikan'])->name('users.pendidikan.pendidikan');
Route::get('penugasan', [MainController::class, 'penugasan'])->name('users.penugasan.penugasan');

// ==============================
// PROFIL 
// ==============================
Route::get('profil', [MainController::class, 'profil'])->name('konten.profil');
Route::post('profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::post('profil/delete', [ProfilController::class, 'delete'])->name('profil.delete');

// ==============================
// BIODATA
// ==============================
Route::post('/biodata/store', [BiodataController::class, 'store'])->name('biodata.store');
Route::get('/biodata/output', [BiodataController::class, 'output'])->name('biodata.output');
Route::get('/biodata/{id}/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/biodata/{id}', [BiodataController::class, 'update'])->name('biodata.update');
Route::delete('/biodata/{id}', [BiodataController::class, 'destroy'])->name('biodata.destroy');
Route::get('/biodata/preview/{filename}', [BiodataController::class, 'preview'])->name('biodata.preview');

// ==============================
// RIWAYAT MENIKAH (dengan auth middleware)
// ==============================
Route::middleware('auth')->group(function () {
    Route::get('/riwayat-menikah/create', [RiwayatMenikahController::class, 'create'])->name('riwayatMenikah.create');
    Route::post('/riwayat-menikah', [RiwayatMenikahController::class, 'store'])->name('riwayatMenikah.store');
    Route::get('/riwayat-menikah/output', [RiwayatMenikahController::class, 'output'])->name('riwayatMenikah.output');
    Route::get('/riwayat-menikah/edit/{id}', [RiwayatMenikahController::class, 'edit'])->name('riwayatMenikah.edit');
    Route::put('/riwayat-menikah/update/{id}', [RiwayatMenikahController::class, 'update'])->name('riwayatMenikah.update');
    Route::post('/riwayat-menikah/delete/{id}', [RiwayatMenikahController::class, 'destroy'])->name('riwayatMenikah.destroy');
});

// ==============================
// RIWAYAT PENDIDIKAN
// ==============================
Route::get('/pendidikan', [RiwayatPendidikanController::class, 'index'])->name('riwayatPendidikan.index');
Route::post('/pendidikan', [RiwayatPendidikanController::class, 'store'])->name('riwayatPendidikan.store');
Route::get('/pendidikan/edit/{id}', [RiwayatPendidikanController::class, 'edit'])->name('riwayatPendidikan.edit');
Route::put('/pendidikan/update/{id}', [RiwayatPendidikanController::class, 'update'])->name('riwayatPendidikan.update');
Route::delete('/pendidikan/delete/{id}', [RiwayatPendidikanController::class, 'destroy'])->name('riwayatPendidikan.destroy');

// ==============================
// RIWAYAT PENUGASAN
// ==============================
Route::get('/penugasan', [RiwayatPenugasanController::class, 'index'])->name('penugasan.index');
Route::get('/penugasan/create', [RiwayatPenugasanController::class, 'create'])->name('penugasan.create');
Route::post('/penugasan/store', [RiwayatPenugasanController::class, 'store'])->name('penugasan.store');
Route::get('/penugasan/output', [RiwayatPenugasanController::class, 'output'])->name('penugasan.output');
Route::get('/penugasan/edit/{id}', [RiwayatPenugasanController::class, 'edit'])->name('penugasan.edit');
Route::put('/penugasan/update/{id}', [RiwayatPenugasanController::class, 'update'])->name('penugasan.update');
Route::delete('/penugasan/delete/{id}', [RiwayatPenugasanController::class, 'destroy'])->name('penugasan.destroy');


// ==============================
// PENDUKUNG / TEST
// ==============================
Route::get('back', [MainController::class, 'back'])->name('back');     // backprofil
Route::get('back2', [MainController::class, 'back2'])->name('back2'); // backlogin

// ==============================
// ADMIN
// ==============================
Route::get('create', [admincontroller::class, 'createakun'])->name('createakun');
Route::post('store', [admincontroller::class, 'store'])->name('admin.store');

Route::get('see-user', [AdminController::class, 'seeuser'])->name('seeuser');
Route::get('kelola-akun', [AdminController::class, 'kelolaAkun'])->name('kelola-akun');
Route::delete('/akun/{id}', [AdminController::class, 'hapus'])->name('akun.hapus');
Route::get('/akun/lihat/{id}', [AdminController::class, 'lihat'])->name('akun.lihat'); // hanya untuk user

Route::get('/users/search', [AdminController::class, 'search'])->name('users.search');

