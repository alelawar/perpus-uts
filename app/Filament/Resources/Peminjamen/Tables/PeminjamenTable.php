<?php

namespace App\Filament\Resources\Peminjamen\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PeminjamenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama')
                    ->label('Siswa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('buku.judul')
                    ->label('Buku')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tgl_pinjam')
                    ->label('Tgl. Pinjam')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('tgl_kembali_seharusnya')
                    ->label('Tgl. Kembali (Seharusnya)')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('tgl_kembali')
                    ->label('Tgl. Kembali (Aktual)')
                    ->date('d/m/Y')
                    ->sortable()
                    ->placeholder('Belum Dikembalikan'),

                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'dipinjam' => '<span class="text-amber-500">Dipinjam</span>',
                        'kembali' => '<span class="text-green-500">Kembali</span>',
                    ])
                    ->allowOptionsHtml()
                    ->native(false)
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state === 'kembali') {
                            $record->tgl_kembali = now();
                            $record->save();

                            Notification::make()
                                ->success()
                                ->title('Buku Dikembalikan')
                                ->body("Buku '{$record->buku->judul}' telah dikembalikan oleh {$record->siswa->nama}.")
                                ->send();
                        } elseif ($state === 'dipinjam') {
                            $record->tgl_kembali = null;
                            $record->save();

                            Notification::make()
                                ->warning()
                                ->title('Status Diubah ke Dipinjam')
                                ->body("Buku '{$record->buku->judul}' kembali dipinjam oleh {$record->siswa->nama}.")
                                ->send();
                        }
                    }),

                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter Status Peminjaman
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'kembali' => 'Kembali',
                    ])
                    ->native(false),

                // Filter Siswa
                SelectFilter::make('siswa_id')
                    ->label('Siswa')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->native(false),

                // Filter Buku
                SelectFilter::make('buku_id')
                    ->label('Buku')
                    ->relationship('buku', 'judul')
                    ->searchable()
                    ->preload()
                    ->native(false),

                // Filter Terlambat
                Filter::make('terlambat')
                    ->label('Buku Terlambat')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('status', 'dipinjam')
                        ->where('tgl_kembali_seharusnya', '<', now()->toDateString()))
                    ->toggle(),

                // Filter Belum Dikembalikan
                Filter::make('belum_dikembalikan')
                    ->label('Belum Dikembalikan')
                    ->query(fn(Builder $query): Builder => $query->where('status', 'dipinjam'))
                    ->toggle(),
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
