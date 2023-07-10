<?php

// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Web\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.Index.login', [
        'title' => 'Login'
    ]);
})->name('index');

Route::post('/login/data', [LoginController::class, 'login'])->name('submitLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [MahasiswaController::class, 'index'])->name('home');
    Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
});

Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');
Route::post('/register/data', [RegisterController::class, 'submitRegister'])->name('submitRegister');


// Route::get('/', function () {
//     return view('pages.Index.login', [
//         'title' => 'Login'
//     ]);
// })->name('index');

// Route::post('/login/data', [LoginController::class, 'login'])->name('sumbitlogin');

// Route::group(['prefix' => 'home', 'namespace' => 'Web', 'middleware' => 'auth:web'], function () {
//     Route::get('/', [MahasiswaController::class, 'index'])->name('home');
// });

// Route::get('/notifikasi', function () {
//     return view('pages.users.notifikasi', [
//         'title' => 'Notifikasi'
//     ]);
// })->name('notifikasi');

// Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');
// Route::post('/register/data',[RegisterController::class, 'store'])->name('submitRegister');
