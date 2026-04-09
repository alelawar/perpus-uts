<?php

namespace App\Filament\Resources\Peminjamen\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PeminjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Peminjaman')
                    ->description('Informasi tentang siswa dan buku yang dipinjam')
                    ->schema([
                        Select::make('siswa_id')
                            ->label('Siswa')
                            ->relationship('siswa', 'nama')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),

                        Select::make('buku_id')
                            ->label('Buku')
                            ->relationship('buku', 'judul')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Tanggal Peminjaman')
                    ->description('Kelola tanggal pinjam dan pengembalian')
                    ->schema([
                        DatePicker::make('tgl_pinjam')
                            ->label('Tanggal Pinjam')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->default(now()),

                        DatePicker::make('tgl_kembali_seharusnya')
                            ->label('Tanggal Kembali Seharusnya')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->helperText('Tentukan deadline pengembalian buku'),

                        DatePicker::make('tgl_kembali')
                            ->label('Tanggal Kembali Aktual')
                            ->displayFormat('d/m/Y')
                            ->helperText('Isi ketika buku sudah dikembalikan'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('Status Peminjaman')
                    ->description('Kelola status peminjaman')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'dipinjam' => 'Dipinjam',
                                'kembali' => 'Kembali',
                            ])
                            ->required()
                            ->native(false)
                            ->helperText('Status akan otomatis berubah ke "Kembali" jika tanggal kembali aktual sudah diisi'),
                    ])
                    ->columns(1)
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}
