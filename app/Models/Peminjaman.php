<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $guarded = [];

    protected $table = 'peminjaman';

    public function bukus()
    {
        return $this->belongsToMany(
            Buku::class,
            'buku_peminjaman',
            'peminjaman_id',
            'buku_id'
        )->withTimestamps();
    }
    public function siswa()
    {
        return parent::belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
