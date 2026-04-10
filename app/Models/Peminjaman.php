<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $guarded = [];

    protected $table = 'peminjaman';

    public function bukus()
    {
        return $this->hasMany(BukuPeminjaman::class);
    }
    public function siswa()
    {
        return parent::belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
