<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // sesuaikan dengan nama tabel di database

    protected $primaryKey = 'id_buku'; // karena pakai id_buku

    public $timestamps = true;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok'
    ];
}
