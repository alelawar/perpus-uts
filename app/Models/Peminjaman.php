<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $guarded = [];

    protected $table = 'peminjaman';

    public function buku($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
        return parent::belongsTo(Buku::class, 'buku_id', 'id');
    }
    public function siswa($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
        return parent::belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
