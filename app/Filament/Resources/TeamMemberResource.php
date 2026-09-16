<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use BackedEnum;
use UnitEnum;
use App\Models\TeamMember;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';
    protected static UnitEnum|string|null $navigationGroup = 'Company Profile';
    protected static ?string $navigationLabel = 'Tim Kami';
    protected static ?string $modelLabel = 'Anggota Tim';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')->required()->maxLength(150)->columnSpan(2),
                    Forms\Components\TextInput::make('jabatan')->required()->maxLength(150)->columnSpan(2),
                    Forms\Components\Textarea::make('deskripsi')->rows(4)->columnSpan(2),
                    Forms\Components\TextInput::make('urutan')->numeric()->default(0)->label('Urutan Tampil'),
                    Forms\Components\FileUpload::make('foto')->image()->directory('team')->imageEditor()->columnSpan(2),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('urutan')
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable(),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
