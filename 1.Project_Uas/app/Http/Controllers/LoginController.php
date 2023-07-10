<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class LoginController extends Controller
{
    function index()
    {
        return view('pages.Index.login', [
            'title' => 'login bro'
        ]);
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'EMAIL' => 'required|email:dns',
            'PASSWORD' => 'required|max:225|min:5',
        ]);
        dd('anjrtttt');
    }
}
