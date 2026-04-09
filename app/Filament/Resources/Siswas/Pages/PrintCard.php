<?php

namespace App\Filament\Resources\Siswas\Pages;

use App\Filament\Resources\Siswas\SiswaResource;
use App\Models\Siswa;
use Filament\Resources\Pages\Page;

class PrintCard extends Page
{

    protected static string $resource = SiswaResource::class;

    protected string $view = 'filament.resources.siswas.pages.print-card';

    public Siswa $siswa;

    public function mount(int|string $record): void
    {
        $this->siswa = Siswa::find($record);

        // dd($this->siswa);
    }
}
