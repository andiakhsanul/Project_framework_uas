<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $mahasiswa;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }
    public function index()
    {
        return view('pages.Index.login', [
            'title' => 'login bro'
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'EMAIL' => 'required|email:dns',
            'PASSWORD' => 'required|max:225|min:5',
        ]);

        // $remember = $request->filled('remember'); // Add this line to remember the user if the "Remember Me" checkbox is selected

        // if (Auth::guard()->attempt(['EMAIL' => $request->input('EMAIL'), 'PASSWORD' => $request->input('PASSWORD')])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        //     dd($credentials);
        // } else {
        //     return redirect()->route('index')->with('logineror', 'Username or password salah');
        // }

        if ($email = $this->mahasiswa
            ->where('EMAIL', $request->EMAIL)
            ->first()
        ) {
            if (Hash::check($request->PASSWORD, $email->PASSWORD)) {
                if (Auth::attempt($credentials)) {
                    $result = redirect()->route('home');
                } else {
                    $result = redirect()->route('index')->with('loginError', 'credential error');
                }
            } else {
                $result = redirect()->route('index')->with('loginError', 'password anda salah');
            }
        } else {
            $result = redirect()->route('index')->with('loginError', 'email anda salah');
        }
        return $result;
    }
}
