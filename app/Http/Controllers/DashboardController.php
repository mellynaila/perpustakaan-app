<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = Anggota::count();
        $totalBuku = Buku::count();
        $totalPeminjaman = Peminjaman::count();

        return view('dashboard', compact(
            'totalAnggota',
            'totalBuku',
            'totalPeminjaman'
        ));
    }
}
