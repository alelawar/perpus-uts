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

    public function peminjamans()
    {
        return $this->belongsToMany(Peminjaman::class, 'buku_peminjaman')
            ->withTimestamps();
    }

    public function bukuPeminjamans()
    {
        return $this->hasMany(BukuPeminjaman::class, 'buku_id', 'id');
    }
}
