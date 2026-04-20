<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Models\Buku;

// LOGIN
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// DASHBOARD (HARUS LOGIN)
Route::get('/dashboard', [DashboardController::class, 'index']);

// LOGOUT (POST - AMAN)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// CRUD BUKU
Route::resource('buku', BukuController::class);

//DAFTAR BUKU TERBARU
Route::get('/daftarbukuterbaru', function () {
    $buku = Buku::latest()->get(); // ambil data terbaru
    return view('daftarbukuterbaru', compact('buku'));
})->name('daftarbukuterbaru');
