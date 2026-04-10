<?php

namespace App\Filament\Resources\Peminjamen\Pages;

use App\Filament\Resources\Peminjamen\PeminjamanResource;
use App\Models\Buku;
use App\Models\Peminjaman;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPeminjaman extends EditRecord
{
    protected static string $resource = PeminjamanResource::class;

    // Property untuk menyimpan status sebelum update
    protected ?string $originalStatus = null;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    /**
     * Hook SEBELUM data di-save: simpan status asli
     */
    protected function beforeSave(): void
    {
        // Simpan status sebelum diupdate
        $this->originalStatus = $this->record->getOriginal('status') ?? $this->record->status;
    }

    /**
     * Hook SETELAH data di-save: cek perubahan & restore stok
     */
    protected function afterSave(): void
    {
        $peminjaman = $this->record;

        // Bandingkan dengan nilai yang kita simpan manual
        if (
            $this->originalStatus === 'dipinjam' &&
            $peminjaman->status === 'kembali'
        ) {
            $this->restoreBookStock($peminjaman);
        }
    }

    /**
     * Helper: Tambahkan stok buku kembali
     */
    private function restoreBookStock(Peminjaman $peminjaman): void
    {
        $bukuIds = $peminjaman->bukus()->pluck('buku_id')->toArray();

        foreach ($bukuIds as $bukuId) {
            $buku = Buku::find($bukuId);
            if ($buku) {
                $buku->increment('stok', 1);
            }
        }

        \Filament\Notifications\Notification::make()
            ->title('Pengembalian tercatat')
            ->body('Stok buku telah dikembalikan secara otomatis.')
            ->success()
            ->send();
    }
}