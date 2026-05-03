<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    // =========================
    // ADMIN - LIST
    // =========================
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // =========================
    // ADMIN - CREATE
    // =========================
    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    // =========================
    // ADMIN - STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'id_anggota' => 'required',
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        Peminjaman::create([
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'dipinjam',
            'denda' => 0
        ]);

        $buku->decrement('stok');

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku berhasil dipinjam');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
    }

    // =========================
    // KEMBALIKAN (MASIH PAKAI UPDATE)
    // =========================
    public function update(Request $request, $id)
    {
        $p = Peminjaman::with('buku')->findOrFail($id);

        $tgl_kembali = Carbon::now();
        $deadline = Carbon::parse($p->tanggal_kembali);

        $hari_telat = $tgl_kembali->greaterThan($deadline)
            ? $deadline->diffInDays($tgl_kembali)
            : 0;

        $denda = $hari_telat * 1000;

        $p->update([
            'status' => 'dikembalikan',
            'tgl_dikembalikan' => $tgl_kembali,
            'denda' => $denda,
        ]);

        $p->buku->increment('stok');

        return back()->with('success', 'Dikembalikan. Denda: Rp ' . number_format($denda));
    }

    // =========================
    // DELETE (TAMBAHAN FIX ERROR)
    // =========================
    public function destroy($id)
    {
        $p = Peminjaman::with('buku')->findOrFail($id);

        // jika belum dikembalikan → stok dikembalikan
        if ($p->status == 'dipinjam') {
            $p->buku->increment('stok');
        }

        $p->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // =========================
    // ANGGOTA - PINJAM
    // =========================
    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        Peminjaman::create([
            'id_anggota' => Auth::id(),
            'id_buku' => $id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => Carbon::now()->addDays(7),
            'status' => 'dipinjam',
            'denda' => 0,
        ]);

        $buku->decrement('stok');

        return redirect()->route('anggota.riwayat')
            ->with('success', 'Buku berhasil dipinjam');
    }

    // =========================
    // ANGGOTA - RIWAYAT
    // =========================
    public function riwayat()
    {
        $data = Peminjaman::with('buku')
            ->where('id_anggota', Auth::id())
            ->latest()
            ->get();

        return view('anggota.riwayat', compact('data'));
    }
}
