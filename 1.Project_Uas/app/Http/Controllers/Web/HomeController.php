<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class HomeController extends Controller
{
    public function index()
    {
        //kalau mau akses tanpa login
        // return view('pages.users.home', [
        //     'title' => 'Home',
        //     'namaUser' => 'Ghandi'
        // ]);

        if (Auth::check()) {
            $user = Auth::user();
            $namaUser = Mahasiswa::where('NAMA', $user->NAMA)->value('NAMA');
            // echo $namaUser;

            return view('pages.users.home', [
                'title' => 'Home',
                'namaUser' => $namaUser
            ]);
        } else {
            // Pengguna tidak terotentikasi, lakukan penanganan yang sesuai
            return redirect()->route('index'); // Contoh: Alihkan pengguna ke halaman login
        }
    }
}
