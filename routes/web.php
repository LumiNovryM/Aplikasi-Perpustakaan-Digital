<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

# Return Redirect To Login Page
Route::get('/', function() {
    return redirect('/login');
});

# Administrator Handler
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
});

# Petugas Handler
Route::prefix('petugas')->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dasboard_petugas'])->name('dashboard_petugas');
});

# Peminjam Handler
Route::prefix('peminjam')->group(function () {
    Route::get('/dasboard', [PeminjamController::class, 'dashboard_peminjam'])->name('dashboard_peminjam');
});

Route::get('/login', [AuthController::class, 'login_page']);
Route::get('/register', [AuthController::class, 'register_page'])->name('register');
