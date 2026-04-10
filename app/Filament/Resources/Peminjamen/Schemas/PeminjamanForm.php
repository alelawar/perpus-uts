<?php

namespace App\Filament\Resources\Peminjamen\Schemas;

use App\Models\Buku;
use App\Models\Siswa;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PeminjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Peminjam')
                    ->description('Data siswa yang melakukan peminjaman')
                    ->icon('heroicon-o-user')
                    ->collapsible()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('siswa_id')
                            ->label('Nama Siswa')
                            ->relationship('siswa', 'nama')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false)
                            ->live()
                            ->default(function () {
                                $nis = request()->query('nis');

                                if (!$nis) return null;

                                $siswa = Siswa::where('nis', $nis)->first();

                                return $siswa?->id;
                            })
                            ->afterStateHydrated(function ($state, callable $set) {
                                if ($state) {
                                    $siswa = Siswa::find($state);
                                    if ($siswa) {
                                        $set('nis_display', $siswa->nis);
                                        $set('kelas_display', $siswa->kelas);
                                    }
                                }
                            })
                            ->columnSpan(2),

                        TextInput::make('nis_display')
                            ->label('NIS')
                            ->disabled()
                            ->dehydrated(false) // Tidak ikut disave ke database
                            ->formatStateUsing(
                                fn($get): string =>
                                $get('nis_display') ?? '-'
                            ),

                        TextInput::make('kelas_display')
                            ->label('Kelas')
                            ->disabled()
                            ->dehydrated(false) // Tidak ikut disave ke database
                            ->formatStateUsing(
                                fn($get): string =>
                                $get('kelas_display') ?? '-'
                            ),
                    ]),

                Section::make('Daftar Buku yang Dipinjam')
                    ->description('Pilih buku yang akan dipinjam (bisa lebih dari satu)')
                    ->icon('heroicon-o-book-open')
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('bukus')
                            ->label('')
                            ->relationship('bukus')
                            ->schema([
                                Select::make('buku_id')
                                    ->label('Pilih Buku')
                                    ->options(function () {
                                        return Buku::query()
                                            ->where('stok', '>', 0)
                                            ->get()
                                            ->mapWithKeys(fn($buku) => [
                                                $buku->id => "{$buku->judul} - {$buku->penulis} (Stok: {$buku->stok})"
                                            ]);
                                    })
                                    ->searchable()
                                    ->required()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->native(false)
                                    ->columnSpan('full')
                                    ->minItems(1)
                                    ->maxItems(5)
                                    ->reorderable()
                                    ->columns(1)
                                    ->columnSpanFull(),
                            ])
                            ->addAction(fn($action) => $action->color('primary')->label('Tambah Item Baru')),

                    ]),

                Section::make('Informasi Tanggal')
                    ->description('Atur periode peminjaman buku')
                    ->icon('heroicon-o-calendar-days')
                    ->collapsible()
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        DatePicker::make('tgl_pinjam')
                            ->label('Tanggal Pinjam')
                            ->required()
                            ->default(now())
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->maxDate(now())
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Auto set jatuh tempo 7 hari dari tanggal pinjam
                                if ($state) {
                                    $set('tgl_kembali_seharusnya', now()->parse($state)->addDays(30));
                                }
                            }),

                        DatePicker::make('tgl_kembali_seharusnya')
                            ->label('Jatuh Tempo')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->minDate(fn($get) => $get('tgl_pinjam'))
                            ->helperText('Batas waktu pengembalian buku'),

                        DatePicker::make('tgl_kembali')
                            ->label('Tanggal Kembali')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->maxDate(now())
                            ->helperText('Kosongkan jika belum dikembalikan')
                            ->hidden(fn($operation) => $operation === 'create'),

                    ]),

                Section::make('Status Peminjaman')
                    ->description('Status pengembalian buku')
                    ->icon('heroicon-o-flag')
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'dipinjam' => 'Sedang Dipinjam',
                                'kembali' => 'Sudah Dikembalikan',
                            ])
                            ->required()
                            ->default('dipinjam')
                            ->native(false)
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state === 'kembali') {
                                    $set('tgl_kembali', now());
                                } else {
                                    $set('tgl_kembali', null);
                                }
                            }),
                    ])
            ]);
    }
}
