<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

// use App\Models\User;

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
            'NAMA' => 'required|max:225',
            'NIS' => 'required|unique:mahasiswa',
            'ALAMAT' => 'required|max:225|min:5',
            'EMAIL' => 'required|max:225|min:5',
            'PASSWORD' => 'required|max:225|min:5',
        ]);

        // Mahasiswa::create([
        //     'NAMA' => $request->name,
        //     'NIS' => $request->nis,
        //     'ALAMAT' => $request->alamat,
        //     'EMAIL' => $request->email,
        //     'PASSWORD' => $request->password,
        // ]);
        // $request=>['PASSWORD']= bcrypt($request=>['PASSWORD']);
        $validatedData['PASSWORD'] = Hash::make($validatedData['PASSWORD']);

        Mahasiswa::create($validatedData);
        // return redirect('/regitrasi')->with('success', 'Registrasi berhasil. Silakan login.');
        return redirect()->route('index')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
