<?php

namespace App\Filament\Resources\Siswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('nis')
                    ->copyable()
                    ->icon(Heroicon::ClipboardDocument)
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->searchable(),
                TextColumn::make('kelas')
                    ->badge()
                    ->searchable(),
                TextColumn::make('jurusan')
                    ->searchable(),
                TextColumn::make('tgl_masuk')
                    ->date()
                    ->sortable(),
                IconColumn::make('is_verified')
                    ->boolean()
                    ->label('Verified'),
                TextColumn::make('verified_at')
                    ->placeholder('Belum Terverifikasi')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('point')
                    ->numeric()
                    ->badge()
                    ->color(function ($state) {
                        if ($state >= 67) {
                            return 'success';
                        } elseif ($state >= 34) {
                            return 'warning';
                        } else {
                            return 'danger';
                        }
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter Status Verifikasi
                TernaryFilter::make('is_verified')
                    ->label('Status Verifikasi')
                    ->placeholder('Semua Siswa')
                    ->trueLabel('Sudah Terverifikasi')
                    ->falseLabel('Belum Terverifikasi')
                    ->native(false),

                // Filter Kelas
                SelectFilter::make('kelas')
                    ->label('Kelas')
                    ->options([
                        'X' => 'Kelas X',
                        'XI' => 'Kelas XI',
                        'XII' => 'Kelas XII',
                    ])
                    ->native(false),

                // Filter Point 0
                Filter::make('point_nol')
                    ->label('Point Habis (0)')
                    ->query(fn (Builder $query): Builder => $query->where('point', 0))
                    ->toggle(),

                // Filter Point Rendah (dibawah 34)
                Filter::make('point_rendah')
                    ->label('Point Rendah (< 34)')
                    ->query(fn (Builder $query): Builder => $query->where('point', '<', 34))
                    ->toggle(),

                // Filter Point Sedang (34-66)
                Filter::make('point_sedang')
                    ->label('Point Sedang (34-66)')
                    ->query(fn (Builder $query): Builder => $query->whereBetween('point', [34, 66]))
                    ->toggle(),

                // Filter Point Tinggi (>= 67)
                Filter::make('point_tinggi')
                    ->label('Point Tinggi (≥ 67)')
                    ->query(fn (Builder $query): Builder => $query->where('point', '>=', 67))
                    ->toggle(),

                // Filter Siswa Baru (3 bulan terakhir)
                Filter::make('siswa_baru')
                    ->label('Siswa Baru (3 Bulan Terakhir)')
                    ->query(fn (Builder $query): Builder => $query->where('tgl_masuk', '>=', now()->subMonths(3)))
                    ->toggle(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}