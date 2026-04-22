<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = \App\Models\Peminjaman::with(['anggota', 'buku'])->get();
        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        $anggota = \App\Models\Anggota::all();
        $buku = \App\Models\Buku::all();
        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        \App\Models\Peminjaman::create($request->all());
        return redirect('/peminjaman');
    }

    public function delete($id)
    {
        \App\Models\Peminjaman::find($id)->delete();
        return redirect('/peminjaman');
    }
}
