<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    // LIST
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // FORM CREATE
    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::where('jml_buku', '>', 0)->get();

        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date'
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($buku->jml_buku <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        Peminjaman::create([
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Dipinjam',
            'denda' => 0
        ]);

        $buku->decrement('jml_buku');

        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil');
    }

    // UPDATE (KEMBALIKAN + DENDA)
    public function update(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $denda = $pinjam->denda; // default ambil yang lama

        if ($request->status == 'Dikembalikan') {

            $today = Carbon::now();
            $tgl_kembali = Carbon::parse($pinjam->tanggal_kembali);

            // HITUNG DENDA
            if ($today->gt($tgl_kembali)) {
                $hari = $tgl_kembali->diffInDays($today);
                $denda = $hari * 1000;
            } else {
                $denda = 0;
            }

            // TAMBAH STOK (hanya sekali)
            if ($pinjam->status != 'Dikembalikan') {
                Buku::find($pinjam->id_buku)->increment('jml_buku');
            }
        }

        $pinjam->update([
            'status' => $request->status ?? $pinjam->status,
            'denda' => $denda
        ]);

        return redirect('/peminjaman')->with('success', 'Buku dikembalikan + denda dihitung');
    }

    // DELETE
    public function destroy($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if ($pinjam->status == 'Dipinjam') {
            Buku::find($pinjam->id_buku)->increment('jml_buku');
        }

        $pinjam->delete();

        return redirect('/peminjaman')->with('success', 'Data dihapus');
    }

    // ADMIN MENU
    public function admin()
    {
        $data = Peminjaman::with(['anggota', 'buku'])
            ->where('status', 'Dipinjam')
            ->get();

        return view('admin.index', compact('data'));
    }
}
