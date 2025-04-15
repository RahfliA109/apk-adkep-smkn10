<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisController;
use App\Http\Controllers\ProfilController;


// LOGIN
Route::get('/',[LoginController::class,'index'])->name('auth.index');
Route::post('/proses', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('profil',[MainController::class,'profil'])->name('konten.profil');
Route::post('profil/update',[ProfilController::class,'update'])->name('profil.update');
Route::post('profil/delete',[ProfilController::class,'delete'])->name('profil.delete');


Route::get('registrasi',[RegisController::class,'registrasi'])->name('auth.registrasi');
Route::post('registrasi',[RegisController::class,'proses'])->name('register.submit');

Route::get('forgotPasword',[MainController::class,'forgotPasword'])->name('auth.forgotPasword');

// KONTEM
Route::get('dashboard',[MainController::class,'dashboard'])->name('konten.dashboard');
Route::get('biodata',[MainController::class,'biodata'])->name('users.biodata.biodata');
Route::get('menikah',[MainController::class,'menikah'])->name('users.menikah.menikah');
Route::get('pendidikan',[MainController::class,'pendidikan'])->name('users.pendidikan.pendidikan');
Route::get('penugasan',[MainController::class,'penugasan'])->name('users.penugasan.penugasan');


// TEST
Route::get('test',[MainController::class,'test'])->name('users.biodata.outputB');
Route::get('test2',[MainController::class,'test2'])->name('konten.datadiri');
