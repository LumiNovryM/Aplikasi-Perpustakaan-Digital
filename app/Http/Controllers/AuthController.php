<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Catch_;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Sistem Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($request->remember === "on") {
                setcookie("email", $request->email);
            } else {
                setcookie("email", "");
            }

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin');
                    break;

                case 'petugas':
                    return redirect()->intended('/petugas');
                    break;

                case 'peminjam':
                default:
                    return redirect()->intended('/');
                    break;
            }
        }

        return redirect()->route('login')->with('error', 'Login gagal. Pastikan username dan password benar.');
    }

    // Sistem Register
    public function register(Request $request)
    {
        try {
            // Validasi data input
            $validatedData = $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'name_lengkap' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
            ]);

            // Buat user baru
            $user = User::create([
                'username' => $validatedData['username'],
                'password' => bcrypt($validatedData['password']),
                'email' => $validatedData['email'],
                'name_lengkap' => $validatedData['name_lengkap'],
                'alamat' => $validatedData['alamat'],
                'role' => 'peminjam',
            ]);

            // Redirect pengguna setelah registrasi
            return redirect('/login')->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
