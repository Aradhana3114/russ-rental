<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipeResource\Pages;
use App\Models\Tipe;
use BackedEnum;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TipeResource extends Resource
{
    protected static ?string $model = Tipe::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static UnitEnum|string|null $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Tipe Transmisi';
    protected static ?string $modelLabel = 'Tipe';
    protected static ?string $pluralModelLabel = 'Tipe Transmisi';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Informasi Tipe')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Tipe')
                        ->required()
                        ->maxLength(100)
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('urutan')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0)
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Tipe')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('mobils_count')
                    ->label('Jumlah Mobil')
                    ->counts('mobils')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan')
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipes::route('/'),
            'create' => Pages\CreateTipe::route('/create'),
            'edit' => Pages\EditTipe::route('/{record}/edit'),
        ];
    }
}
