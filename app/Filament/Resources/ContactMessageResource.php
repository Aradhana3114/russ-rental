<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use BackedEnum;
use UnitEnum;
use App\Models\ContactMessage;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-envelope';
    protected static UnitEnum|string|null $navigationGroup = 'Inquiries';
    protected static ?string $navigationLabel = 'Pesan Masuk';
    protected static ?string $modelLabel = 'Pesan Kontak';
    protected static ?int $navigationSort = 6;

    public static function canCreate(): bool
    {
        return false; // pesan hanya dibuat dari form public
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')->disabled(),
                    Forms\Components\TextInput::make('telepon')->disabled(),
                    Forms\Components\TextInput::make('email')->disabled(),
                    Forms\Components\TextInput::make('layanan')->label('Kategori Pesan')->disabled(),
                    Forms\Components\Textarea::make('pesan')->label('Saran/Kritik')->disabled()->rows(4)->columnSpan(2),
                    Forms\Components\Select::make('status')
                        ->options([
                            'baru' => 'Baru',
                            'diproses' => 'Diproses',
                            'selesai' => 'Selesai',
                        ])
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('telepon'),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('layanan')->label('Kategori')->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'baru' => 'danger',
                        'diproses' => 'warning',
                        'selesai' => 'success',
                        default => 'secondary',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'selesai' => 'Selesai',
                ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([\Filament\Actions\DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
