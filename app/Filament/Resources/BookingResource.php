<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use BackedEnum;
use UnitEnum;
use App\Models\Booking;
use App\Models\Mobil;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-calendar-days';
    protected static UnitEnum|string|null $navigationGroup = 'Inquiries';
    protected static ?string $navigationLabel = 'Data Booking';
    protected static ?string $modelLabel = 'Booking';
    protected static ?string $pluralModelLabel = 'Data Booking';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Detail Booking')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('mobil_id')
                        ->label('Mobil')
                        ->options(fn () => Mobil::pluck('nama', 'id'))
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'menunggu' => 'Menunggu',
                            'dikonfirmasi' => 'Dikonfirmasi',
                            'selesai' => 'Selesai',
                            'dibatalkan' => 'Dibatalkan',
                        ])
                        ->required()
                        ->default('dikonfirmasi'),

                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(150),

                    Forms\Components\TextInput::make('whatsapp')
                        ->label('Nomor WhatsApp')
                        ->required()
                        ->maxLength(30),

                    Forms\Components\DatePicker::make('tanggal_mulai')
                        ->label('Tanggal Mulai')
                        ->required(),

                    Forms\Components\DatePicker::make('tanggal_selesai')
                        ->label('Tanggal Selesai')
                        ->required(),

                    Forms\Components\Textarea::make('catatan')
                        ->label('Catatan')
                        ->rows(3)
                        ->columnSpan(2),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mobil.nama')
                    ->label('Mobil')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp'),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'menunggu' => 'warning',
                        'dikonfirmasi' => 'success',
                        'selesai' => 'secondary',
                        'dibatalkan' => 'danger',
                        default => 'secondary',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diajukan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'menunggu' => 'Menunggu',
                    'dikonfirmasi' => 'Dikonfirmasi',
                    'selesai' => 'Selesai',
                    'dibatalkan' => 'Dibatalkan',
                ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('konfirmasi')
                        ->label('Konfirmasi Booking')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['status' => 'dikonfirmasi']))
                        ->deselectRecordsAfterCompletion(),
                    \Filament\Actions\BulkAction::make('selesai')
                        ->label('Tandai Selesai')
                        ->icon('heroicon-o-flag')
                        ->action(fn ($records) => $records->each->update(['status' => 'selesai']))
                        ->deselectRecordsAfterCompletion(),
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
