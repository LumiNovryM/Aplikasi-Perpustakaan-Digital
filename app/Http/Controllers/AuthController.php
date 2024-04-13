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
                return redirect()->route('dashboard_admin');
            } else if ($request->role === 'petugas') {
                return redirect()->route('dashboard_petugas');
            } else if ($request->role === 'peminjam') {
                return redirect()->route('dashboard_peminjam');
            }

        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
