<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\MahasiswaModels;
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

Route::get('/', [MahasiswaController::class, 'getMahasiswa']);

Route::get('/Registrasi', function () {
    return view('pages.index.registrasi', [
        'title' => 'Registrasi'
    ]);
});

Route::get('/login', function () {
    //
});
