<?php

namespace App\Filament\Resources\Peminjamen\Pages;

use App\Filament\Resources\Peminjamen\PeminjamanResource;
use App\Livewire\ScanQrModal;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListPeminjamen extends ListRecords
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Action::make('scan_qr')
                ->label('Scan QR (CARI)')
                ->icon('heroicon-o-qr-code')
                ->modalHeading('Cari Data Siswa')
                ->color('warning')
                ->modalSubmitAction(false) // ga butuh tombol submit
                ->modalContent(view('livewire.scan-qr-modal')),

            Action::make('scan_qr_create')
                ->label('Scan QR (Buat)')
                ->icon('heroicon-o-qr-code')
                ->color('success')
                ->modalHeading('Buat Data Peminjaman Siswa')
                ->modalSubmitAction(false) // ga butuh tombol submit
                ->modalContent(view('livewire.qr-scanner-create')),

            CreateAction::make()
                ->icon(Heroicon::Plus),

        ];
    }
}
