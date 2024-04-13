<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth.login');
    }

    public function register_page()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->role === 'administrator') {
                return redirect()->intended('dashboard_admin');
            } else if ($request->role === 'petugas') {
                return redirect()->intended('dashboard_petugas');
            } else if ($request->role === 'peminjam') {
                return redirect()->intended('dashboard_peminjam');
            }

            return redirect()->intended('dashboard');
        }

        return redirect('login');
    }
}
