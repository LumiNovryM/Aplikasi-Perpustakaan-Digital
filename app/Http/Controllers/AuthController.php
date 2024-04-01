<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth.sign-in');
    }

    public function register_page()
    {
        return view('auth.sign-up');
    }
}
