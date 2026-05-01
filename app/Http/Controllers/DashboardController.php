<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth; // <-- INI WAJIB

class DashboardController extends Controller
{
    public function admin()
    {
        $totalAnggota = Anggota::count();
        $totalBuku = Buku::count();
        $totalPeminjaman = Peminjaman::count();

        return view('admin.dashboard', compact(
            'totalAnggota',
            'totalBuku',
            'totalPeminjaman'
        ));
    }

    public function anggota()
    {
        // jumlah pinjaman aktif user login
        $totalPinjam = \App\Models\Peminjaman::where('id_anggota', auth()->id())
            ->where('status', 'dipinjam')
            ->count();

        // total semua buku
        $totalBuku = \App\Models\Buku::count();

        return view('anggota.dashboard', compact('totalPinjam', 'totalBuku'));
    }
}
