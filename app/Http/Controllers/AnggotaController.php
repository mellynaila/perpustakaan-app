<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function halaman()
    {
        $data = Anggota::all();
        return view('anggota', compact('data'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date'
        ], [
            'nama.required' => 'Nama wajib diisi!',
            'nim.required' => 'NIM wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!'
        ]);

        Anggota::create([
            'nama_anggota' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir
        ]);

        return redirect('/anggota')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = \App\Models\Anggota::where('id_anggota', $id)->first();

        if (!$anggota) {
            return redirect('/anggota')->with('error', 'Data tidak ditemukan');
        }

        return view('edit_anggota', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date'
        ]);

        Anggota::where('id_anggota', $id)->update([
            'nama_anggota' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir
        ]);

        return redirect('/anggota')->with('success', 'Data berhasil diupdate!');
    }

    public function hapus($id)
    {
        Anggota::where('id_anggota', $id)->delete();
        return redirect('/anggota');
    }
}
