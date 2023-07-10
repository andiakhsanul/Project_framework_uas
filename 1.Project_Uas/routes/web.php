<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.Index.login', [
        'title' => 'Login'
    ]);
})->name('index');

// Route::get('/Registrasi', function () {
//     return view('pages.index.registrasi', [
//         'title' => 'Registrasi'
//     ]);
// });
// <<<<<<< HEAD
route::post('/login/data', [LoginController::class, 'authenticate'])->name('sumbitlogin');
// =======

Route::get('/home', function () {
    return view('pages.users.home', [
        'title' => 'Home',
    ]);
})->name('home');

Route::get('/notifikasi', function () {
    return view('pages.users.notifikasi', [
        'title' => 'Notifikasi'
    ]);
})->name('notifikasi');
// <<<<<<< Updated upstream
// =======
// >>>>>>> a99626423cdfda8697831f45a51ac76fed46e5b1
// >>>>>>> Stashed changes

Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');
Route::post('/register/data', [RegisterController::class, 'store'])->name('submitRegister');
