<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class LoginController extends Controller
{
    public function index()
    {
        return view('pages.Index.login', [
            'title' => 'login bro'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'EMAIL' => 'required|email:dns',
            'PASSWORD' => 'required|max:225|min:5',
        ]);

        $remember = $request->filled('remember'); // Add this line to remember the user if the "Remember Me" checkbox is selected

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors([
            'loginerror' => 'Invalid credentials, bro'
        ])->withInput($request->except('PASSWORD')); // Add this line to keep the email input value after a failed attempt
    }
}
