<?php

namespace App\Filament\Resources\Bukus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BukusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->label('Cover')
                    ->disk('public')
                    ->visibility('public'),

                TextColumn::make('judul')
                    ->label('Judul Buku')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('penulis')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('penerbit')
                    ->label('Penerbit')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->alignCenter(),

                TextColumn::make('peminjaman_count')
                    ->label('Total Dipinjam')
                    ->counts('peminjaman')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state >= 10 => 'success',
                        $state >= 20 => 'info',
                        $state >= 50 => 'warning',
                        default => 'gray',
                    })
                    ->icon('heroicon-o-arrow-trending-up')
                    ->tooltip('Jumlah total buku ini dipinjam'),

                TextColumn::make('stok')
                    ->label('Stok')
                    ->searchable()
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color(fn(string $state): string => match (true) {
                        $state > 10 => 'success',
                        $state > 5 => 'warning',
                        default => 'danger',
                    }),

                TextColumn::make('rak')
                    ->label('Rak')
                    ->searchable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('hambalan')
                    ->label('Hambalan')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('sinopsis')
                    ->label('Sinopsis')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap(),

                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
