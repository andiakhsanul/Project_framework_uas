<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/class NotifikasiController extends Controller
{
    public function index()
    {
        return view('pages.users.notifikasi', [
            'title' => 'Notifikasi'
        ]);
    }
}
