<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
//use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;

// LOGIN
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// DASHBOARD
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// CRUD BUKU (VERSI BENAR)
Route::resource('buku', BukuController::class);
