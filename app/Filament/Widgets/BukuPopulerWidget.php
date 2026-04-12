<?php

namespace App\Filament\Widgets;

use App\Models\Buku;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class BukuPopulerWidget extends TableWidget
{

    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 10;

      public function table(Table $table): Table
    {
        return $table
            ->heading('Buku Terpopuler')
            ->query(
                Buku::query()
                    ->withCount('bukuPeminjamans')
                    ->orderBy('buku_peminjamans_count', 'desc')
                    ->limit(10)
            )
            ->columns([
                ImageColumn::make('cover')
                    ->label('Cover')
                    ->size(60)
                    ->circular(),
                    
                TextColumn::make('judul')
                    ->label('Judul Buku')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),
                    
                TextColumn::make('penulis')
                    ->label('Penulis')
                    ->searchable()
                    ->limit(30),
                    
                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary'),
                    
                TextColumn::make('stok')
                    ->label('Stok')
                    ->alignCenter()
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state == 0 => 'danger',
                        $state <= 3 => 'warning',
                        default => 'success',
                    }),
                    
                TextColumn::make('buku_peminjamans_count')
                    ->label('Total Dipinjam')
                    ->alignCenter()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn ($state) => $state . ' kali'),
            ])
            ->defaultSort('buku_peminjamans_count', 'desc');
    }
}
