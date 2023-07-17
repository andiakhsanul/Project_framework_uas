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
        if (Auth::check()) {
            $user = Auth::user();
            $namaUser = Mahasiswa::where('NAMA', $user->NAMA)->value('NAMA');

            $jadwalharian = $user->catatans; // Retrieve the jadwalharian records associated with the user
            $activeFormId = null; // Inisialisasi variabel $activeFormId

            return view('pages.users.home', [
                'title' => 'Home',
                'namaUser' => $namaUser,
                'jadwalharian' => $jadwalharian, // Pass the jadwalharian variable to the view
                'activeFormId' => $activeFormId // Pass the activeFormId variable to the view
            ]);
        } else {
            // Pengguna tidak terotentikasi, lakukan penanganan yang sesuai
            return redirect()->route('index'); // Contoh: Alihkan pengguna ke halaman login
        }
    }

}
