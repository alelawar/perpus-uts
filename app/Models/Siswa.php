<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Siswa extends Model
{
    protected $guarded = [];

    protected $table = 'siswa';

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'siswa_id', 'id');
    }


    // protected static function booted()
    // {
    //     static::created(function ($siswa) {
    //         $siswa->generateQrCode();
    //     });

    //     static::updated(function ($siswa) {
    //         // Re-generate kalo NIS berubah
    //         if ($siswa->isDirty('nis')) {
    //             $siswa->generateQrCode();
    //         }
    //     });
    // }

    // public function generateQrCode()
    // {
    //     $url = "{$this->nis}";

    //     $qrCode = QrCode::format('png')
    //         ->size(300)
    //         ->margin(1)
    //         ->generate($url);

    //     Storage::disk('public')->put("qrcodes/{$this->nis}.png", $qrCode);
    // }

    public function getQrCodeInlineAttribute()
    {
        $url = "{$this->nis}";

        return QrCode::format('svg')
            ->size(300)
            ->margin(1)
            ->generate($url);
    }

    public function getQrCodeUrlAttribute()
    {
        return Storage::url("qrcodes/{$this->nis}.png");
    }
}
