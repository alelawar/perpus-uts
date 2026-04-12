<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class SiswaAktifWidget extends TableWidget
{
    protected static ?int $sort = 7;
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->heading('Siswa Paling Aktif Meminjam')
            ->query(
                Siswa::query()
                    ->withCount('peminjaman')
                    ->having('peminjaman_count', '>', 0)
                    ->orderBy('peminjaman_count', 'desc')
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('ranking')
                    ->label('#')
                    ->getStateUsing(function ($rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        1 => 'warning',
                        2 => 'gray',
                        3 => 'danger',
                        default => 'primary',
                    }),
                    
                TextColumn::make('nama')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->weight('bold')
                    ->icon('heroicon-m-user-circle'),
                    
                TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('NIS disalin!')
                    ->copyMessageDuration(1500),
                    
                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->badge()
                    ->color('info'),
                    
                TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->badge()
                    ->color('success'),
                    
                TextColumn::make('point')
                    ->label('Point')
                    ->numeric()
                    ->alignCenter()
                    ->badge()
                    ->color('warning')
                    ->icon('heroicon-m-star'),
                    
                TextColumn::make('peminjaman_count')
                    ->label('Total Peminjaman')
                    ->alignCenter()
                    ->sortable()
                    ->badge()
                    ->color('primary')
                    ->formatStateUsing(fn ($state) => $state . ' kali'),
                    
                IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->alignCenter(),
            ])
            ->defaultSort('peminjaman_count', 'desc');
    }
}
