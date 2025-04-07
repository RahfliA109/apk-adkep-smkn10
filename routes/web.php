<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('login.login');
Route::get('/registrasi', [MainController::class, 'registrasi'])->name('login.registrasi');

Route::get('datadiri', [MainController::class, 'datadiri']);
Route::get('dashboard',[MainController::class,'dashboard']);
Route::get('sertifikat', [MainController::class, 'sertifikat'])->name('konten.dashboard');
Route::get('pendidikan', [MainController::class, 'pendidikan'])->name('konten.riwayat_pendidikan');// back to dashbord
Route::get('penugasan', [MainController::class, 'penugasan'])->name('konten.riwayat_penugasan');// back to dashbord

//testing 
Route::get('testing',[MainController::class,'test'])->name('testing.test');
