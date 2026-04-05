<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    protected $table = 'kategori';

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
