<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'login_page']);
Route::get('/register', [AuthController::class, 'register_page'])->name('register');