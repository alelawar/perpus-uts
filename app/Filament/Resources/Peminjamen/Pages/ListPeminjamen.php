<?php

namespace App\Filament\Resources\Peminjamen\Pages;

use App\Filament\Resources\Peminjamen\PeminjamanResource;
use App\Livewire\ScanQrModal;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPeminjamen extends ListRecords
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('scan_qr')
                ->label('Scan QR')
                ->icon('heroicon-o-qr-code')
                ->modalHeading('Scan QR Siswa')
                ->modalSubmitAction(false) // ga butuh tombol submit
                ->modalContent(view('livewire.scan-qr-modal')),
        ];
    }
}
