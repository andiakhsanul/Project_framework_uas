<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MahasiswaModels;

class MahasiswaController extends Controller
{
    public function getMahasiswa()
    {
        $data = MahasiswaModels::all();
        return view('pages.users.home', compact('data'));
    }
}
