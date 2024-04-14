<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Authentication Handler
Route::get('/login', [AuthController::class, 'login_page'])->name('login');
Route::get('/register', [AuthController::class, 'register_page'])->name('register');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

# Administrator Handler
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
});

# Petugas Handler
Route::prefix('petugas')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard_petugas'])->name('dashboard_petugas');
});

# Peminjam Handler
Route::prefix('peminjam')->middleware('auth')->group(function () {
    Route::get('/dasboard', [PeminjamController::class, 'dashboard_peminjam'])->name('dashboard_peminjam');
});
