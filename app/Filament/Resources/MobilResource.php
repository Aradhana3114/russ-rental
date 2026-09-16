<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MobilResource\Pages;
use BackedEnum;
use UnitEnum;
use App\Models\Mobil;
use App\Models\Kategori;
use App\Models\Tipe;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-truck';
    protected static UnitEnum|string|null $navigationGroup = 'Fleet Management';
    protected static ?string $navigationLabel = 'Armada Mobil';
    protected static ?string $modelLabel = 'Mobil';
    protected static ?string $pluralModelLabel = 'Armada Mobil';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Informasi Mobil')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Mobil')
                        ->required()
                        ->maxLength(150)
                        ->columnSpan(2),

                    Forms\Components\Select::make('kategori_id')
                        ->label('Kategori Kendaraan')
                        ->relationship('kategori', 'nama')
                        ->required()
                        ->searchable()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('nama')->required()->unique(ignoreRecord: true),
                            Forms\Components\TextInput::make('urutan')->numeric()->default(0),
                        ]),

                    Forms\Components\Select::make('tipe_id')
                        ->label('Tipe Transmisi')
                        ->relationship('tipe', 'nama')
                        ->required()
                        ->searchable()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('nama')->required()->unique(ignoreRecord: true),
                            Forms\Components\TextInput::make('urutan')->numeric()->default(0),
                        ]),

                    Forms\Components\TextInput::make('kapasitas')
                        ->label('Kapasitas (Kursi)')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(20)
                        ->required(),

                    Forms\Components\TextInput::make('stok')
                        ->label('Jumlah Unit (Stok)')
                        ->helperText('Total unit fisik mobil ini yang dimiliki Russ Rental.')
                        ->numeric()
                        ->minValue(0)
                        ->default(1)
                        ->required(),

                    Forms\Components\TextInput::make('harga_per_hari')
                        ->label('Harga Sewa / Hari (Rp)')
                        ->numeric()
                        ->prefix('Rp')
                        ->required(),

                    Forms\Components\TextInput::make('rating')
                        ->label('Rating')
                        ->numeric()
                        ->step(0.1)
                        ->minValue(0)
                        ->maxValue(5)
                        ->default(4.8),

                    Forms\Components\Select::make('status')
                        ->label('Status Ketersediaan')
                        ->options([
                            'tersedia' => 'Tersedia',
                            'disewa' => 'Disewa',
                            'servis' => 'Servis',
                        ])
                        ->required()
                        ->default('tersedia'),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpan(2),

                    Forms\Components\FileUpload::make('gambar')
                        ->label('Foto Mobil')
                        ->image()
                        ->disk('public')
                        ->directory('mobils')
                        ->imageEditor()
                        ->columnSpan(2),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Foto')
                    ->square(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Mobil')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tipe.nama')
                    ->label('Transmisi')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'Manual' => 'Manual',
                        'Automatic (AT/Matic)' => 'Automatic (AT/Matic)',
                        'CVT (Continuously Variable Transmission)' => 'CVT (Continuously Variable Transmission)',
                        'DCT (Dual Clutch Transmission)' => 'DCT (Dual Clutch Transmission)',
                        'AMT (Automated Manual Transmission)' => 'AMT (Automated Manual Transmission)',
                        default => $state,
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('stok')
                    ->label('Total Unit')
                    ->suffix(' unit')
                    ->sortable(),

                Tables\Columns\TextColumn::make('unit_tersedia')
                    ->label('Tersedia Hari Ini')
                    ->suffix(' unit')
                    ->color(fn (int $state): string => $state <= 0 ? 'danger' : ($state <= 2 ? 'warning' : 'success'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('harga_per_hari')
                    ->label('Harga/Hari')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->suffix(' ★')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'disewa' => 'warning',
                        'servis' => 'danger',
                        default => 'secondary',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_id')
                    ->label('Kategori Kendaraan')
                    ->relationship('kategori', 'nama'),
                Tables\Filters\SelectFilter::make('tipe_id')
                    ->label('Tipe Transmisi')
                    ->relationship('tipe', 'nama'),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'disewa' => 'Disewa',
                        'servis' => 'Servis',
                    ]),
            ])
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
            'index' => Pages\ListMobils::route('/'),
            'create' => Pages\CreateMobil::route('/create'),
            'edit' => Pages\EditMobil::route('/{record}/edit'),
        ];
    }
}
