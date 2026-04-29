<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('anggota.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'nim' => 'required|unique:anggota,nim',
            'alamat' => 'nullable',
            'tgl_lahir' => 'nullable|date'
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data berhasil ditambah');
    }

    // FORM EDIT
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $request->validate([
            'nama_anggota' => 'required',
            'nim' => 'required|unique:anggota,nim,' . $id . ',id_anggota',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
