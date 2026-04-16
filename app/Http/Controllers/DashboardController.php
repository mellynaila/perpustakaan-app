<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import model (sesuaikan dengan punyamu)
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        // cek login sederhana (optional, kalau pakai session)
        if (!session()->has('username')) {
            return redirect('/');
        }

        // ambil data dari database
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();

        $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $bukuDikembalikan = Peminjaman::where('status', 'kembali')->count();

        return view('dashboard', compact(
            'totalBuku',
            'totalKategori',
            'bukuDipinjam',
            'bukuDikembalikan'
        ));
    }
}
