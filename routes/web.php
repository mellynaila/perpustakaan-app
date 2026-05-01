<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuListController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

    Route::resource('buku', BukuController::class);
    Route::resource('anggota', AnggotaController::class)
        ->parameters(['anggota' => 'anggota']);
    Route::resource('peminjaman', PeminjamanController::class);
});


/*
|--------------------------------------------------------------------------
| ANGGOTA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:anggota'])->group(function () {

    Route::get('/dashboard-anggota', [DashboardController::class, 'anggota'])
        ->name('anggota.dashboard');

    // ganti biar tidak bentrok dengan admin
    Route::get('/buku-list', [BukuListController::class, 'indexAnggota']);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
