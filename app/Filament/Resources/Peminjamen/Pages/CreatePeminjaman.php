<?php

namespace App\Filament\Resources\Peminjamen\Pages;

use App\Filament\Resources\Peminjamen\PeminjamanResource;
use App\Models\Buku;
use App\Models\Siswa;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Hook yang dipanggil SETELAH data disimpan ke database
     * Di sini kita kurangi stok buku yang dipinjam
     */
    protected function afterCreate(): void
    {
        // Ambil record peminjaman yang baru saja dibuat
        $peminjaman = $this->record;

        // Ambil semua buku yang dipinjam melalui relasi
        $bukuIds = $peminjaman->bukus()->pluck('buku_id')->toArray();

        // Kurangi stok setiap buku yang dipinjam
        foreach ($bukuIds as $bukuId) {
            $buku = Buku::find($bukuId);
            
            if ($buku && $buku->stok > 0) {
                $buku->decrement('stok', 1); // Kurangi stok sebanyak 1
            }
        }

        // Notifikasi sukses (opsional)
        \Filament\Notifications\Notification::make()
            ->title('Peminjaman berhasil dibuat')
            ->body('Stok buku telah dikurangi secara otomatis.')
            ->success()
            ->send();
    }

    /**
     * Alternative: Bisa juga pakai handleRecordCreation jika mau custom logic lebih kompleks
     */
    // protected function handleRecordCreation(array $data): Model
    // {
    //     // Simpan peminjaman dulu
    //     $peminjaman = static::getModel()::create($data);
    //     
    //     // Kurangi stok buku
    //     if (isset($data['bukus'])) {
    //         foreach ($data['bukus'] as $buku) {
    //             $bukuModel = Buku::find($buku['buku_id']);
    //             if ($bukuModel && $bukuModel->stok > 0) {
    //                 $bukuModel->decrement('stok', 1);
    //             }
    //         }
    //     }
    //     
    //     return $peminjaman;
    // }
}