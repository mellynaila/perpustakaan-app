<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    protected $table = 'public.peminjaman';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_anggota',
        'id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'denda',
        'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | FITUR TAMBAHAN (TANPA KOLOM DATABASE)
    |--------------------------------------------------------------------------
    */

    // Hitung hari keterlambatan
    public function getTerlambatAttribute()
    {
        $today = Carbon::now();
        $tgl_kembali = Carbon::parse($this->tanggal_kembali);

        if ($today->gt($tgl_kembali)) {
            return $today->diffInDays($tgl_kembali);
        }

        return 0;
    }

    // Hitung denda (1000/hari)
    public function getDendaAttribute()
    {
        return $this->terlambat * 5000;
    }
}
