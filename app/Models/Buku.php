<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'public.buku';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jml_buku',
        'kategori',
        'status'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku', 'id');
    }
}
