<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'id_anggota',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    public function anggota()
    {
        return $this->belongsTo(Buku::class, 'id_anggota');
    }
}
