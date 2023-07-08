<?php

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


Route::get('/register/view', [RegisterController::class, 'index'])->name('registerForms');
Route::post('/register/data', [RegisterController::class, 'store'])->name('submitRegister');
