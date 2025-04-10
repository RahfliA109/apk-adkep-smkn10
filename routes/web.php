<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

// ==================== REDIRECT ROOT TO LOGIN ====================
Route::get('/', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});

<
// ==================== AUTHENTICATION ROUTES ====================
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [MainController::class, 'index'])->name('login');
    Route::get('/registrasi', [MainController::class, 'registrasi'])->name('login.registrasi');
});

Route::post('/login', [MainController::class, 'login'])->name('login.proses');
Route::post('/registrasi', [MainController::class, 'registerStore'])->name('register.store');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');

// ==================== AUTHENTICATED ROUTES ====================
Route::middleware(['session.auth'])->group(function () {
// Dashboard
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

// Biodata Routes
    Route::prefix('datadiri')->group(function () {
        Route::get('/', [MainController::class, 'datadiri'])->name('datadiri');
        Route::post('/', [MainController::class, 'store'])->name('datadiri.store');
        Route::get('/hasil', [MainController::class, 'hasil'])->name('datadiri.hasil');
        Route::get('/edit/{id}', [MainController::class, 'editDatadiri'])->name('datadiri.edit');
        Route::put('/update/{id}', [MainController::class, 'updateDatadiri'])->name('datadiri.update');
        Route::delete('/delete/{id}', [MainController::class, 'deleteDatadiri'])->name('datadiri.destroy');
    });

    // Menikah Routes
    Route::prefix('menikah')->group(function () {
        Route::get('/', [MainController::class, 'menikah'])->name('konten.menikah');
        Route::post('/store', [MainController::class, 'storeMenikah'])->name('menikah.store');
        Route::get('/hasil', [MainController::class, 'hasilMenikah'])->name('menikah.hasil');
        Route::get('/edit/{id}', [MainController::class, 'editMenikah'])->name('menikah.edit');
        Route::put('/update/{id}', [MainController::class, 'updateMenikah'])->name('menikah.update');
        Route::delete('/delete/{id}', [MainController::class, 'deleteMenikah'])->name('menikah.destroy');
    });

    // Pendidikan & Penugasan
    Route::get('/pendidikan', [MainController::class, 'pendidikan'])->name('konten.pendidikan');
    Route::post('/pendidikan', [MainController::class, 'pendidikan'])->name('konten.pendidikan');

    Route::get('/penugasan', [MainController::class, 'penugasan'])->name('konten.penugasan');
    Route::get('/penugasan', [MainController::class, 'penugasan'])->name('penugasan.index');
Route::post('/penugasan/store', [MainController::class, 'storePenugasan'])->name('penugasan.store');


    // Testing
    Route::get('/testing', [MainController::class, 'test'])->name('testing.test');
});