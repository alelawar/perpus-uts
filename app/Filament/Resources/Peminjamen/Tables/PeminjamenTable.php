<?php

namespace App\Filament\Resources\Peminjamen\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
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
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('siswa.nis')
                    ->label('NIS')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('bukus_count')
                    ->label('Jumlah Buku')
                    ->counts('bukus')
                    ->badge()
                    ->color('info')
                    ->alignCenter(),

                TextColumn::make('bukus.judul')
                    ->label('Buku yang Dipinjam')
                    ->listWithLineBreaks()
                    ->limitList(3)
                    ->expandableLimitedList()
                    ->searchable(),

                TextColumn::make('tgl_pinjam')
                    ->label('Tanggal Pinjam')
                    ->date('d M Y')
                    ->sortable()
                    ->icon('heroicon-o-calendar'),

                TextColumn::make('tgl_kembali_seharusnya')
                    ->label('Jatuh Tempo')
                    ->date('d M Y')
                    ->sortable()
                    ->icon('heroicon-o-clock')
                    ->color(fn($record) => $record->status === 'dipinjam' && now()->gt($record->tgl_kembali_seharusnya) ? 'danger' : 'gray'),

                TextColumn::make('tgl_kembali')
                    ->label('Tanggal Kembali')
                    ->date('d M Y')
                    ->sortable()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->placeholder('Belum Kembali')
                    ->toggleable(),

                // SelectColumn::make('status')
                //     ->label('Status')
                //     ->options([
                //         'dipinjam' => '<span class="text-amber-500">Dipinjam</span>',
                //         'kembali' => '<span class="text-green-500">Kembali</span>',
                //     ])
                //     ->allowOptionsHtml()
                //     ->native(false)
                //     ->selectablePlaceholder(false)
                //     ->beforeStateUpdated(function ($record, $state) {
                //         // Validasi: cek apakah ada perubahan status
                //         if ($record->status === $state) {
                //             return false;
                //         }
                //     })
                //     ->afterStateUpdated(function ($record, $state) {
                //         if ($state === 'kembali') {
                //             $record->tgl_kembali = now();
                //             $record->save();

                //             Notification::make()
                //                 ->success()
                //                 ->title('Buku Berhasil Dikembalikan')
                //                 ->body("{$record->bukus->count()} buku dari {$record->siswa->nama} telah dikembalikan")
                //                 ->icon('heroicon-o-check-badge')
                //                 ->send();
                //         } elseif ($state === 'dipinjam') {
                //             $record->tgl_kembali = null;
                //             $record->save();

                //             Notification::make()
                //                 ->warning()
                //                 ->title('Status Diubah ke Dipinjam')
                //                 ->body("Peminjaman {$record->siswa->nama} kembali aktif")
                //                 ->icon('heroicon-o-arrow-path')
                //                 ->send();
                //         }
                //     }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dipinjam' => 'warning',
                        'kembali' => 'success',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'dipinjam' => 'heroicon-m-arrow-right-circle',
                        'kembali' => 'heroicon-m-check-circle',
                        default => 'heroicon-m-question-mark-circle',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diupdate Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Peminjaman')
                    ->options([
                        'dipinjam' => 'Sedang Dipinjam',
                        'kembali' => 'Sudah Kembali',
                    ])
                    ->native(false),

                SelectFilter::make('siswa')
                    ->label('Siswa')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->native(false),

                Filter::make('terlambat')
                    ->label('Terlambat Kembali')
                    ->query(
                        fn(Builder $query): Builder =>
                        $query->where('status', 'dipinjam')
                            ->where('tgl_kembali_seharusnya', '<', now())
                    )
                    ->toggle(),

                Filter::make('tgl_pinjam')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('dari')
                            ->label('Dari Tanggal'),
                        \Filament\Forms\Components\DatePicker::make('sampai')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tgl_pinjam', '>=', $date),
                            )
                            ->when(
                                $data['sampai'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tgl_pinjam', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->before(function ($records, $action) {
                        if ($records->contains(fn ($record) => $record->status === 'dipinjam')) {

                            Notification::make()
                                ->title('Gagal hapus')
                                ->body('Ada data yang masih dipinjam!, pastikan data yang dipilih sudah dikembalikan!')
                                ->danger()
                                ->send();

                            $action->cancel(); 
                        }
                    })
                ]),
            ])
            ->emptyStateHeading('Belum Ada Data Peminjaman')
            ->emptyStateDescription('Mulai tambahkan data peminjaman buku dengan klik tombol di atas.')
            ->emptyStateIcon('heroicon-o-book-open');
    }
}
