<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::with(['anggota', 'buku'])
            ->latest()
            ->first(); // ambil 1 data saja

        return view('laporan.index', compact('data'));
    }
}
