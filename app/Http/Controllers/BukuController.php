<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // ADMIN - tampil data
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    // ANGGOTA
    public function indexAnggota()
    {
        $buku = Buku::where('stok', '>', 0)->get();
        return view('anggota.index', compact('buku'));
    }

    // ✅ TAMBAHAN (WAJIB untuk resource)
    public function create()
    {
        return view('buku.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jml_buku' => 'required|numeric',
            'kategori' => 'required',
            'status' => 'required'
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',          // 🔧 disamakan
            'penulis' => 'required',        // 🔧 disamakan
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jml_buku' => 'required|numeric',
            'kategori' => 'required',
            'status' => 'required'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // HAPUS
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
