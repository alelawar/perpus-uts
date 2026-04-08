<?php

namespace App\Filament\Resources\Bukus\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BukuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('nama')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            )
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated()
                            ->columnSpan(2),

                    ])
                    ->columnSpan(1),

                TextInput::make('judul')
                    ->label('Judul Buku')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    )
                    ->columnSpan(1),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabled()
                    ->dehydrated()
                    ->columnSpan(2),

                TextInput::make('penulis')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('penerbit')
                    ->label('Penerbit')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->required()
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->columnSpan(1),

                TextInput::make('stok')
                    ->label('Stok')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->columnSpan(1),

                TextInput::make('rak')
                    ->label('Rak')
                    ->required()
                    ->maxLength(50)
                    ->columnSpan(1),

                TextInput::make('hambalan')
                    ->label('Hambalan')
                    ->required()
                    ->maxLength(50)
                    ->columnSpan(1),

                Textarea::make('sinopsis')
                    ->label('Sinopsis')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),

                FileUpload::make('cover')
                    ->label('Cover Buku')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '2:3',
                        '3:4',
                    ])
                    ->directory('covers')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
