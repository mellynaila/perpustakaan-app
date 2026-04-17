<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;

// =====================
// LOGIN
// =====================
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// =====================
// LOGOUT (LEBIH AMAN - POST)
// =====================
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =====================
// CRUD BUKU (PROTECTED)
// =====================
Route::middleware('auth.session')->group(function () {
    Route::resource('buku', BukuController::class);
});
