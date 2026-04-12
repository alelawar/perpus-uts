<?php

namespace App\Filament\Widgets;

use App\Models\Buku;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class StokBukuRendahWidget extends TableWidget
{
    protected static ?int $sort = 8;

    protected int | string | array $columnSpan = 'full';

     public function table(Table $table): Table
    {
        return $table
            ->heading('Stok Buku Menipis')
            ->description('Buku dengan stok ≤ 5 atau habis')
            ->query(
                Buku::query()
                    ->whereRaw('CAST(stok AS UNSIGNED) <= 5')
                    ->orderByRaw('CAST(stok AS UNSIGNED) ASC')
            )
            ->columns([
                ImageColumn::make('cover')
                    ->label('Cover')
                    ->size(50)
                    ->circular(),
                    
                TextColumn::make('judul')
                    ->label('Judul Buku')
                    ->searchable()
                    ->weight('bold')
                    ->limit(40),
                    
                TextColumn::make('penulis')
                    ->label('Penulis')
                    ->limit(25),
                    
                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary'),
                    
                TextColumn::make('rak')
                    ->label('Rak')
                    ->icon('heroicon-m-map-pin')
                    ->badge()
                    ->color('gray'),
                    
                TextColumn::make('hambalan')
                    ->label('Hambalan')
                    ->badge()
                    ->color('gray'),
                    
                TextColumn::make('stok')
                    ->label('Stok')
                    ->alignCenter()
                    ->weight('bold')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state == 0 => 'danger',
                        $state <= 2 => 'warning',
                        $state <= 5 => 'info',
                        default => 'success',
                    })
                    ->icon(fn (string $state): string => match (true) {
                        $state == 0 => 'heroicon-m-exclamation-triangle',
                        $state <= 2 => 'heroicon-m-exclamation-circle',
                        default => 'heroicon-m-information-circle',
                    }),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->getStateUsing(fn (Buku $record) => 
                        $record->stok == 0 ? 'Habis' : 'Tersedia'
                    )
                    ->color(fn (Buku $record) => 
                        $record->stok == 0 ? 'danger' : 'success'
                    ),
            ])
            ->emptyStateHeading('Semua stok aman!')
            ->emptyStateDescription('Tidak ada buku dengan stok menipis')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
