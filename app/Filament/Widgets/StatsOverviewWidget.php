<?php

namespace App\Filament\Widgets;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Siswa;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
 protected function getStats(): array
    {
        return [
            Stat::make('Total Buku', Buku::count())
                ->description('Total koleksi buku')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            
            Stat::make('Total Siswa', Siswa::count())
                ->description('Siswa terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart([3, 5, 7, 4, 6, 8, 7, 9]),
            
            Stat::make('Peminjaman Aktif', Peminjaman::where('status', 'dipinjam')->count())
                ->description('Sedang dipinjam')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning')
                ->chart([5, 6, 4, 8, 7, 6, 5, 7]),
            
            Stat::make('Total Kategori', Kategori::count())
                ->description('Kategori buku')
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary')
                ->chart([2, 2, 3, 3, 4, 4, 5, 5]),
        ];
    }
}
