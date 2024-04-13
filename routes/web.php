<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

# Return Redirect To Login Page
Route::get('/', function() {
    return redirect('/login');
});

# Authentication Handler
Route::get('/login', [AuthController::class, 'login_page'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'register_page'])->middleware('guest')->name('register');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');

# Administrator Handler
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
});

# Petugas Handler
Route::prefix('petugas')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dasboard_petugas'])->name('dashboard_petugas');
});

# Peminjam Handler
Route::prefix('peminjam')->middleware('auth')->group(function () {
    Route::get('/dasboard', [PeminjamController::class, 'dashboard_peminjam'])->name('dashboard_peminjam');
});