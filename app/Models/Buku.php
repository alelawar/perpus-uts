<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $guarded = [];

    protected $table = 'buku';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id', 'id');
    }
}
