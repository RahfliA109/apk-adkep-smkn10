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
Route::post('/cek-email', [PasswordController::class, 'cekEmail'])->name('password.check');
Route::post('/simpan-password', [PasswordController::class, 'simpanPassword'])->name('password.save');

// ==============================
// DASHBOARD & KONTEN UTAMA
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

// ==============================
// RIWAYAT MENIKAH (dengan auth middleware)
// ==============================
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat-menikah', [RiwayatMenikahController::class, 'index'])->name('riwayatMenikah.index');
    Route::post('/riwayat-menikah', [RiwayatMenikahController::class, 'store'])->name('riwayatMenikah.store');
    Route::get('/riwayat-menikah/edit', [RiwayatMenikahController::class, 'edit'])->name('riwayatMenikah.edit');
    Route::post('/riwayat-menikah/update', [RiwayatMenikahController::class, 'update'])->name('riwayatMenikah.update');
    Route::post('/riwayat-menikah/delete', [RiwayatMenikahController::class, 'destroy'])->name('riwayatMenikah.destroy');
});

// ==============================
// RIWAYAT PENDIDIKAN
// ==============================
Route::get('/pendidikan', [RiwayatPendidikanController::class, 'index'])->name('riwayatPendidikan.index');
Route::post('/pendidikan', [RiwayatPendidikanController::class, 'store'])->name('riwayatPendidikan.store');
Route::get('/pendidikan/edit', [RiwayatPendidikanController::class, 'edit'])->name('riwayatPendidikan.edit');
Route::put('/pendidikan/update/{id}', [RiwayatPendidikanController::class, 'update'])->name('riwayatPendidikan.update');
Route::delete('/pendidikan/delete/{id}', [RiwayatPendidikanController::class, 'destroy'])->name('riwayatPendidikan.destroy');

// ==============================
// RIWAYAT PENUGASAN
// ==============================
Route::get('/penugasan', [RiwayatPenugasanController::class, 'create'])->name('penugasan.create');
Route::post('/penugasan', [RiwayatPenugasanController::class, 'store'])->name('penugasan.store');
Route::get('/penugasan/output', [RiwayatPenugasanController::class, 'output'])->name('penugasan.output');
Route::get('/penugasan/edit/{id}', [RiwayatPenugasanController::class, 'edit'])->name('penugasan.edit');
Route::put('/penugasan/update/{id}', [RiwayatPenugasanController::class, 'update'])->name('penugasan.update');
Route::delete('/penugasan/delete/{id}', [RiwayatPenugasanController::class, 'destroy'])->name('penugasan.delete');

// ==============================
// PENDUKUNG / TEST
// ==============================
Route::get('test', [MainController::class, 'test'])->name('users.biodata.outputB');
Route::get('test2', [MainController::class, 'test2'])->name('konten.datadiri');
Route::get('back', [MainController::class, 'back'])->name('back');     // backprofil
Route::get('back2', [MainController::class, 'back2'])->name('back2'); // backlogin
