<?php

namespace App\Filament\Widgets;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PeminjamanPerHariWidget extends ChartWidget
{
    protected ?string $heading = 'Peminjaman 7 Hari Terakhir' ;
    
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Peminjaman::query()
            ->where('tgl_pinjam', '>=', now()->subDays(7))
            ->select(DB::raw('DATE(tgl_pinjam) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
 
        // Generate semua tanggal 7 hari terakhir
        $dates = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $count = $data->firstWhere('date', $date)?->count ?? 0;
            
            $dates->push([
                'date' => $date,
                'count' => $count,
            ]);
        }
 
        return [
            'datasets' => [
                [
                    'label' => 'Peminjaman',
                    'data' => $dates->pluck('count')->toArray(),
                    'backgroundColor' => 'rgba(139, 92, 246, 0.2)',
                    'borderColor' => 'rgb(139, 92, 246)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $dates->map(fn ($item) => 
                Carbon::parse($item['date'])->format('D, d M')
            )->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
        ];
    }
}
