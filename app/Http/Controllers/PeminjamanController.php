<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::where('jml_buku', '>', 0)->get();

        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|integer|exists:anggota,id_anggota',
            'id_buku' => 'required|integer|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date'
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($buku->jml_buku <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        Peminjaman::create([
            'id_anggota' => (int) $request->id_anggota,
            'id_buku' => (int) $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Dipinjam',
            'denda' => 0
        ]);

        $buku->decrement('jml_buku');

        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if (!$request->has('status')) {

            $request->validate([
                'id_anggota' => 'required|integer|exists:anggota,id_anggota',
                'id_buku' => 'required|integer|exists:buku,id',
                'tanggal_pinjam' => 'required|date',
                'tanggal_kembali' => 'required|date'
            ]);

            $pinjam->update([
                'id_anggota' => (int) $request->id_anggota,
                'id_buku' => (int) $request->id_buku,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);

            return redirect('/peminjaman')->with('success', 'Data berhasil diupdate');
        }

        $denda = 0;

        if ($request->status == 'Dikembalikan') {

            $today = Carbon::now();
            $tgl_kembali = Carbon::parse($pinjam->tanggal_kembali);

            if ($today->gt($tgl_kembali)) {
                $hari = $tgl_kembali->diffInDays($today);
                $denda = $hari * 1000;
            }

            if ($pinjam->status != 'Dikembalikan') {
                $buku = Buku::find($pinjam->id_buku);

                if ($buku) {
                    $buku->increment('jml_buku');
                }
            }
        }

        $pinjam->update([
            'status' => $request->status,
            'denda' => $denda
        ]);

        return redirect('/peminjaman')->with('success', 'Buku dikembalikan + denda dihitung');
    }

    public function destroy($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if ($pinjam->status == 'Dipinjam') {
            Buku::find($pinjam->id_buku)->increment('jml_buku');
        }

        $pinjam->delete();

        return redirect('/peminjaman')->with('success', 'Data dihapus');
    }
}
