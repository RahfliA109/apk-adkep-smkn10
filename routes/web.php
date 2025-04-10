<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

// ========================== Redirect Default ==========================
Route::get('/', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});

// ========================== Auth (Login, Logout, Register) ==========================
Route::get('/login', [AuthController::class, 'index'])->name('login');             
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');      
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/kembali', [MainController::class, 'kembali'])->name('login.login');

Route::get('/lupa', [MainController::class, 'lupa'])->name('lupa');
Route::post('/lupa', [MainController::class, 'sendResetLink'])->name('lupa.proses');

Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('register');        // Halaman registrasi
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('login.registrasi');
Route::post('/registrasi', [AuthController::class, 'registerStore'])->name('register.store'); // Proses registrasi

// ========================== Dashboard ==========================
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

// ========================== Biodata ==========================
Route::get('/datadiri', [MainController::class, 'datadiri'])->name('datadiri');              // Form biodata
Route::post('/datadiri', [MainController::class, 'store'])->name('datadiri.store');          // Simpan biodata
Route::get('/datadiri/hasil', [MainController::class, 'hasil'])->name('datadiri.hasil');     // Lihat hasil biodata

// Edit & Update Biodata
Route::get('/datadiri/edit/{id}', [MainController::class, 'editDatadiri'])->name('datadiri.edit');      
Route::put('/datadiri/update/{id}', [MainController::class, 'updateDatadiri'])->name('datadiri.update');
// Delete Biodata
Route::delete('/datadiri/delete/{id}', [MainController::class, 'deleteDatadiri'])->name('datadiri.destroy');

// ========================== Riwayat Menikah ==========================
Route::get('/menikah', [MainController::class, 'menikah'])->name('konten.menikah');          
Route::post('/riwayat-menikah', [MainController::class, 'storeMenikah'])->name('menikah.store');

// ========================== Pendidikan & Penugasan ==========================
Route::get('/pendidikan', [MainController::class, 'pendidikan'])->name('konten.pendidikan');
Route::get('/penugasan', [MainController::class, 'penugasan'])->name('konten.penugasan');

// ========================== Testing ==========================
Route::get('/testing', [MainController::class, 'test'])->name('testing.test');
