<?php

namespace App\Filament\Widgets;

use App\Models\Kategori;
use Filament\Widgets\ChartWidget;

class KategoriDistributionWidget extends ChartWidget
{
    protected ?string $heading = 'Kategori Distribution Widget';

    protected static ?int $sort = 5;

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $kategoris = Kategori::withCount('buku')
            ->having('buku_count', '>', 0)
            ->get();

        $colors = [
            'rgb(59, 130, 246)',   // blue
            'rgb(16, 185, 129)',   // green
            'rgb(249, 115, 22)',   // orange
            'rgb(139, 92, 246)',   // purple
            'rgb(236, 72, 153)',   // pink
            'rgb(245, 158, 11)',   // amber
            'rgb(20, 184, 166)',   // teal
            'rgb(239, 68, 68)',    // red
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Buku',
                    'data' => $kategoris->pluck('buku_count')->toArray(),
                    'backgroundColor' => array_slice($colors, 0, $kategoris->count()),
                    'borderWidth' => 2,
                    'borderColor' => '#ffffff',
                ],
            ],
            'labels' => $kategoris->pluck('nama')->toArray(),
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
            'maintainAspectRatio' => true,
        ];
    }
}
