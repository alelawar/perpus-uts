<?php

namespace App\Filament\Widgets;

use App\Models\Peminjaman;
use Filament\Widgets\ChartWidget;

class StatusPeminjamanWidget extends ChartWidget
{
    protected ?string $heading = 'Status Peminjaman Widget';

    protected static ?int $sort = 6;

    protected function getData(): array
    {
        $dipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $kembali = Peminjaman::where('status', 'kembali')->count();
        $terlambat = Peminjaman::where('status', 'dipinjam')
            ->where('tgl_kembali_seharusnya', '<', now())
            ->count();
 
        return [
            'datasets' => [
                [
                    'label' => 'Status',
                    'data' => [$dipinjam - $terlambat, $kembali, $terlambat],
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',   // blue - dipinjam
                        'rgb(16, 185, 129)',   // green - kembali
                        'rgb(239, 68, 68)',    // red - terlambat
                    ],
                    'borderWidth' => 2,
                    'borderColor' => '#ffffff',
                ],
            ],
            'labels' => ['Dipinjam (Tepat Waktu)', 'Sudah Kembali', 'Terlambat'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
