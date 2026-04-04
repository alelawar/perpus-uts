<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    protected $table = 'buku';

    public function peminjaman($related, $foreignKey = null, $localKey = null)
    {
        return $this->hasMany(Peminjaman::class, 'siswa_id', 'id');
    }
}
