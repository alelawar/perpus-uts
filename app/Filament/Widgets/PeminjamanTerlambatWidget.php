<?php

namespace App\Filament\Widgets;

use App\Models\Peminjaman;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PeminjamanTerlambatWidget extends TableWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

public function table(Table $table): Table
    {
        return $table
            ->heading('Peminjaman Terlambat')
            ->query(
                Peminjaman::query()
                    ->where('status', 'dipinjam')
                    ->where('tgl_kembali_seharusnya', '<', today())
                    ->with(['siswa', 'bukus.buku'])
                    ->orderBy('tgl_kembali_seharusnya', 'asc')
            )
            ->columns([
               TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-m-user'),
                    
               TextColumn::make('siswa.nis')
                    ->label('NIS')
                    ->searchable(),
                    
               TextColumn::make('siswa.kelas')
                    ->label('Kelas')
                    ->badge()
                    ->color('gray'),
                    
               TextColumn::make('tgl_pinjam')
                    ->label('Tgl Pinjam')
                    ->date('d M Y')
                    ->sortable(),
                    
               TextColumn::make('tgl_kembali_seharusnya')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable()
                    ->color('danger')
                    ->weight('bold'),
                    
               TextColumn::make('terlambat')
                    ->label('Terlambat')
                    ->badge()
                    ->color('danger')
                    ->getStateUsing(function (Peminjaman $record) {
                         $deadline = \Carbon\Carbon::parse($record->tgl_kembali_seharusnya)->startOfDay();

                         // pakai tgl_kembali kalau ada, kalau belum pakai hari ini
                         $compareDate = $record->tgl_kembali
                              ? \Carbon\Carbon::parse($record->tgl_kembali)->startOfDay()
                              : now()->startOfDay();

                         $diff = $deadline->diffInDays($compareDate, false);

                         return $diff . ' hari';
                    }),
                    
               TextColumn::make('bukus_count')
                    ->label('Jumlah Buku')
                    ->counts('bukus')
                    ->badge()
                    ->color('warning')
                    ->alignCenter(),
            ])
            ->defaultSort('tgl_kembali_seharusnya', 'asc')
            ->emptyStateHeading('Tidak ada peminjaman terlambat')
            ->emptyStateDescription('Semua peminjaman tepat waktu!')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
