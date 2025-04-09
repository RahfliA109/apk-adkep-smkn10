<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ========================== Redirect Default ==========================
Route::get('/', function () {
    return redirect()->route('login');
});

// ========================== Auth (Login, Logout, Register) ==========================
Route::get('/login', [MainController::class, 'index'])->name('login');                 // Halaman login
Route::post('/login', [MainController::class, 'login'])->name('login.proses');         // Proses login
Route::get('/logout', [MainController::class, 'logout'])->name('logout');              // Logout

Route::get('/registrasi', [MainController::class, 'registrasi'])->name('login.registrasi'); // Halaman registrasi
Route::post('/registrasi', [MainController::class, 'registerStore'])->name('register.store'); // Proses registrasi

// ========================== Dashboard ==========================
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

// ========================== Biodata ==========================
Route::get('/datadiri', [MainController::class, 'datadiri'])->name('datadiri');        // Form biodata
Route::post('/datadiri', [MainController::class, 'store'])->name('datadiri.store');     // Simpan biodata
Route::get('/datadiri/hasil', [MainController::class, 'hasil'])->name('datadiri.hasil'); // Lihat hasil biodata
Route::get('/datadiri/edit/{id}', [MainController::class, 'edit'])->name('datadiri.edit'); //Edit 
Route::delete('/datadiri/delete/{id}', [MainController::class, 'destroy'])->name('datadiri.destroy'); //Delete


// ========================== Riwayat Menikah ==========================
Route::get('/menikah', [MainController::class, 'menikah'])->name('konten.menikah');     // Form riwayat menikah
Route::post('/riwayat-menikah', [MainController::class, 'storeMenikah'])->name('menikah.store'); // Simpan data menikah

// ========================== Pendidikan & Penugasan ==========================
Route::get('/pendidikan', [MainController::class, 'pendidikan'])->name('konten.pendidikan'); // Halaman pendidikan
Route::get('/penugasan', [MainController::class, 'penugasan'])->name('konten.penugasan');     // Halaman penugasan

// ========================== Testing ==========================
Route::get('/testing', [MainController::class, 'test'])->name('testing.test');
