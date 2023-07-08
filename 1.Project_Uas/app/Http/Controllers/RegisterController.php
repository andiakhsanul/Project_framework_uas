<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.Index.registrasi', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:user',
            'password' => 'required|max:225|min:5'
        ]);

        User::create($validatedData);

        return redirect('/regitrasi')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
