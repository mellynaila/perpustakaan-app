<?php

namespace App\Http\Controllers;

use App\Models\Buku;

class BukuListController extends Controller
{
    // ANGGOTA - daftar buku
    public function indexAnggota()
    {
        $buku = Buku::where('stok', '>', 0)->get();

        return view('buku-list.index', compact('buku'));
    }
}
