<?php

namespace App\Filament\Resources\Peminjamen\Pages;

use App\Filament\Resources\Peminjamen\PeminjamanResource;
use App\Models\Siswa;
use Filament\Resources\Pages\CreateRecord;

class CreatePeminjaman extends CreateRecord
{
    protected static string $resource = PeminjamanResource::class;

    public function mount(): void
    {
        parent::mount();

        // Cek query parameter nis
        if (request()->has('nis')) {
            $siswa = Siswa::where('nis', request()->get('nis'))->first();

            if ($siswa) {
                // Force fill form data
                $this->form->fill([
                    'siswa_id' => $siswa->id,
                    'nis_display' => $siswa->nis,
                    'kelas_display' => $siswa->kelas,
                ]);
            }
        }
    }
}
