<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Siswa')
                    ->description('Informasi pribadi dan identitas siswa')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email (Email aktif Siswa)')
                            ->unique('siswa', 'email', ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'Email sudah digunakan, silakan pakai yang lain.',
                                'required' => 'Email wajib diisi.',
                            ])
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(20),

                        TextInput::make('nis')
                            ->label('NIS (Nomor Induk Siswa)')
                            ->unique('siswa', 'nis', ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'NIS sudah digunakan, silakan pakai yang lain.',
                                'required' => 'NIS wajib diisi.',
                            ])
                            ->required()
                            ->maxLength(20),

                        TextInput::make('no_telp')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->unique('siswa', 'no_telp', ignoreRecord: true)
                            ->required()
                            ->maxLength(15)
                            ->placeholder('08xxxxxxxxxx'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Data Akademik')
                    ->description('Informasi kelas dan jurusan siswa')
                    ->schema([
                        Select::make('kelas')
                            ->label('Kelas')
                            ->options([
                                'X' => 'Kelas X',
                                'XI' => 'Kelas XI',
                                'XII' => 'Kelas XII',
                            ])
                            ->required()
                            ->native(false),

                        TextInput::make('jurusan')
                            ->label('Jurusan')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Contoh: IPA, IPS, Teknik Komputer'),

                        DatePicker::make('tgl_masuk')
                            ->label('Tanggal Masuk')
                            ->required()
                            ->displayFormat('d/m/Y'),

                        TextInput::make('point')
                            ->label('Point Siswa')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->suffix('poin'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Status Verifikasi')
                    ->description('Kelola status verifikasi siswa')
                    ->schema([
                        Toggle::make('is_verified')
                            ->label('Sudah Diverifikasi')
                            ->default(false)
                            ->live()
                            ->helperText('Aktifkan untuk menandai siswa sudah terverifikasi'),

                    ])
                    ->columns(1)
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}
