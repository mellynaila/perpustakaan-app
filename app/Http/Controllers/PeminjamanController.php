<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function pinjam($id)
    {
        // cek stok dulu (biar aman)
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        Peminjaman::create([
            'id_anggota' => Auth::id(),
            'id_buku' => $id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
            'denda' => 0
        ]);

        // kurangi stok
        $buku->decrement('stok');

        return back()->with('success', 'Buku berhasil dipinjam');
    }

    public function riwayat()
    {
        $data = Peminjaman::where('id_anggota', Auth::id())
            ->with('buku')
            ->get();

        return view('anggota.riwayat-peminjaman', compact('data'));
    }
}
