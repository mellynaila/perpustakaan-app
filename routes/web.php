<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
/*
|--------------------------------------------------------------------------
| AUTH (LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


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
    | DATA MASTER
    |--------------------------------------------------------------------------
    */

    Route::resource('buku', BukuController::class);
    Route::get('/anggota', [AnggotaController::class, 'halaman']);
    Route::post('/anggota/tambah', [AnggotaController::class, 'tambah']);

    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);

    Route::get('/anggota/hapus/{id}', [AnggotaController::class, 'hapus']);

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::resource('peminjaman', PeminjamanController::class);
});
