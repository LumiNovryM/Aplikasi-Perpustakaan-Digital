<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard_petugas()
    {
        return view('petugas.dashboard');
    }
}
