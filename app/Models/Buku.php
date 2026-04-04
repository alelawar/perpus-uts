<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $guarded = [];

    protected $table = 'buku';

    public function kategori($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function peminjaman($related, $foreignKey = null, $localKey = null)
    {
        return $this->hasMany(Peminjaman::class, 'buku_id', 'id');
    }
}
