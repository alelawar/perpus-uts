<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuPeminjaman extends Model
{
    protected $guarded = [];

    protected $table = 'buku_peminjaman';

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
