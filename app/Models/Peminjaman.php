<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tgl_dikembalikan',
        'status',
        'denda'
    ];

    public function getRouteKeyName()
    {
        return 'id_peminjaman';
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(\App\Models\Buku::class, 'id_buku');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR (TANPA KOLOM DATABASE)
    |--------------------------------------------------------------------------
    */

    // Hitung hari keterlambatan
    public function getTerlambatAttribute()
    {
        if (!$this->tanggal_kembali) return 0;

        $tgl_kembali = Carbon::parse($this->tanggal_kembali);

        // kalau sudah dikembalikan pakai tanggal itu, kalau belum pakai hari ini
        $tgl = $this->tgl_dikembalikan
            ? Carbon::parse($this->tgl_dikembalikan)
            : Carbon::today();

        return $tgl->gt($tgl_kembali)
            ? $tgl_kembali->diffInDays($tgl)
            : 0;
    }
}
