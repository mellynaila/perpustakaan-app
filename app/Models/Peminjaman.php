<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;


    protected $table = 'peminjaman';
    protected $primaryKey = 'id_buku';
    public $timestamps = false;

    protected $fillable = [
        'nama_peminjam',
        'id_buku',
        'tgl_pinjam'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
