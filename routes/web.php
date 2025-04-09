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
Route::post('/datadiri', [MainController::class, 'store']);
Route::get('/datadiri/hasil', [MainController::class, 'hasil'])->name('datadiri.hasil');
Route::get('/datadiri/edit/{id}', [MainController::class, 'edit']);
Route::post('/datadiri/update/{id}', [MainController::class, 'update']);

Route::get('dashboard',[MainController::class,'dashboard']);




Route::get('menikah', [MainController::class, 'menikah'])->name('konten.menikah');




Route::get('pendidikan', [MainController::class, 'pendidikan'])->name('konten.pendidikan');




Route::get('penugasan', [MainController::class, 'penugasan'])->name('konten.penugasan');

//testing 
Route::get('testing',[MainController::class,'test'])->name('testing.test');
