<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('buku.index', compact('data'));
    }

    public function store(Request $request)
    {
        Buku::create($request->all());

        return redirect()->route('buku.store')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Buku::all();
        $edit = Buku::findOrFail($id);

        return view('buku.edit', compact('data', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.update')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Buku::destroy($id);

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
