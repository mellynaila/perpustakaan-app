<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'public.anggota';
    protected $primaryKey = 'id_anggota';
    public $timestamps = false;

    protected $fillable = [
        'nama_anggota',
        'nim',
        'alamat',
        'tgl_lahir'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
