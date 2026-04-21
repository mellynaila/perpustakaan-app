<?php

namespace App\Http\Controllers;

use App\Models\Buku;
//use App\Models\Pengguna;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil 6 buku terbaru
        $buku = Buku::latest()->take(6)->get();

        // data untuk card
        $totalBuku = Buku::count();

        return view('dashboard', compact(
            'buku',
            'totalBuku',
        ));
    }
}
