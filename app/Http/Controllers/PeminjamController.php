<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function dashboard_peminjam()
    {
        return view('peminjam.dashboard');
    }
}
