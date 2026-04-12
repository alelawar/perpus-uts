<?php

namespace App\Filament\Widgets;

use App\Models\Peminjaman;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class AktivitasTerbaruWidget extends TableWidget
{
    protected static ?int $sort = 9;
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->heading('Aktivitas Peminjaman Terbaru')
            ->query(
                Peminjaman::query()
                    ->with(['siswa', 'bukus.buku'])
                    ->latest()
                    ->limit(15)
            )
            ->columns([
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->since()
                    ->description(fn (Peminjaman $record): string => 
                        $record->created_at->format('d M Y, H:i')
                    ),
                    
                TextColumn::make('siswa.nama')
                    ->label('Siswa')
                    ->searchable()
                    ->weight('bold')
                    ->description(fn (Peminjaman $record): string => 
                        $record->siswa->nis . ' - ' . $record->siswa->kelas
                    ),
                    
                TextColumn::make('tgl_pinjam')
                    ->label('Tgl Pinjam')
                    ->date('d M Y')
                    ->icon('heroicon-m-calendar'),
                    
                TextColumn::make('tgl_kembali_seharusnya')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->color(fn (Peminjaman $record) => 
                        $record->status === 'dipinjam' && now() > $record->tgl_kembali_seharusnya 
                        ? 'danger' 
                        : 'gray'
                    )
                    ->weight(fn (Peminjaman $record) => 
                        $record->status === 'dipinjam' && now() > $record->tgl_kembali_seharusnya 
                        ? 'bold' 
                        : 'normal'
                    ),
                    
                TextColumn::make('tgl_kembali')
                    ->label('Tgl Kembali')
                    ->date('d M Y')
                    ->placeholder('-')
                    ->icon('heroicon-m-check-circle')
                    ->color('success'),
                    
                TextColumn::make('bukus_count')
                    ->label('Jumlah Buku')
                    ->counts('bukus')
                    ->badge()
                    ->color('info')
                    ->alignCenter(),
                    
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
            ])
            ->defaultSort('created_at', 'desc');
    }
}
