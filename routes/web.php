<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================
// LOGIN
// =====================
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// =====================
// DASHBOARD
// =====================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// =====================
// LOGOUT
// =====================
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// =====================
// CRUD PENGGUNA
// =====================
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/tambah', [BukuController::class, 'create']);
Route::post('/buku/simpan', [BukuController::class, 'store']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::post('/buku/update/{id}', [BukuController::class, 'update']);
Route::get('/buku/hapus/{id}', [BukuController::class, 'destroy']);
