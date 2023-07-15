<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Web\MahasiswaController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.Index.login', [
//         'title' => 'Login'
//     ]);
// })->name('index');

// Ghandi ndak bisa login aku pakek iki Route tanpa login Edit UI Login, Home
// Route::get('/', [LoginController::class, 'index'])->name('index');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::post('/storeCatatan', [CatatanController::class, 'store'])->name('storeCatatan');
// Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');

// Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');

Route::get('/', [LoginController::class, 'index'])->name('index');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/submitLogin', [LoginController::class, 'submitLogin'])->name('submitLogin');


Route::group(['middleware' => ['auth', 'mahasiswa']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('/notifikasi');
});

//route buat form buat catatannya
Route::post('/storeCatatan', [CatatanController::class, 'store'])->name('storeCatatan');

Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');
Route::post('/register/data', [RegisterController::class, 'submitRegister'])->name('submitRegister');
