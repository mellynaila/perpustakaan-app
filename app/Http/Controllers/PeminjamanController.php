<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('buku')->get();
        $buku = Buku::all();

        return view('peminjaman', compact('peminjaman', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        // CEK STOK
        if ($buku->jml_buku <= 0) {
            return back()->with('error', 'Stok buku habis!');
        }

        // SIMPAN
        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
        ]);

        // KURANGI STOK
        $buku->jml_buku -= 1;

        // UPDATE STATUS
        if ($buku->jml_buku == 0) {
            $buku->status = 'Dipinjam';
        }

        $buku->save();

        return back()->with('success', 'Buku berhasil dipinjam');
    }

    public function update(Request $request, $id)
    {
        $data = Peminjaman::findOrFail($id);

        $data->update([
            'nama_peminjam' => $request->nama_peminjam,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
        ]);

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);

        // KEMBALIKAN STOK
        $buku = Buku::find($data->id_buku);
        $buku->jml_buku += 1;
        $buku->status = 'Tersedia';
        $buku->save();

        $data->delete();

        return back()->with('success', 'Data dihapus & stok kembali');
    }
}
