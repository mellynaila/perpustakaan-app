<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware([])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | MENU ADMIN (LIHAT DATA PEMINJAMAN)
    |--------------------------------------------------------------------------
    */
    Route::get('/admin', [PeminjamanController::class, 'admin'])->name('admin');

    /*
    |--------------------------------------------------------------------------
    | DATA MASTER
    |--------------------------------------------------------------------------
    */

    // BUKU
    Route::resource('buku', BukuController::class);

    // ANGGOTA
    Route::resource('anggota', AnggotaController::class);

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    // PEMINJAMAN
    Route::resource('peminjaman', PeminjamanController::class);
});