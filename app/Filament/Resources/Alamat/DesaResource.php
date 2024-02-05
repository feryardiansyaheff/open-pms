<?php

namespace App\Filament\Resources\Alamat;

use App\Filament\Resources\Alamat\DesaResource\Pages;
use App\Filament\Resources\Alamat\DesaResource\RelationManagers;
use App\Models\Alamat\Desa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesaResource extends Resource
{
    protected static ?string $modelLabel = 'Kelola Desa';
    protected static ?string $model = Desa::class;
    protected static ?string $slug = 'desa';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Kelola Desa';
    protected static ?string $navigationGroup = 'Master Data - Alamat';
    protected static ?string $navigationIcon = 'healthicons-f-village';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->relationship('kecamatan', 'nm_kecamatan')
                    ->required()
                    ->searchable()
                    ->optionsLimit(5),

                Forms\Components\TextInput::make('nm_desa')
                    ->label('Nama Desa')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nm_kades')
                    ->label('Nama Kepala Desa')
                    ->required()
                    ->maxLength(255),

                Forms\Components\ToggleButtons::make('wil_admin')
                    ->label('Wilayah Administratif')
                    ->boolean()
                    ->grouped(),

                Forms\Components\TextInput::make('jml_penduduk')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->step(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('kecamatan.nm_kecamatan')
                    ->label('Kecamatan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nm_desa')
                    ->label('Nama Desa')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nm_kades')
                    ->label('Kepala Desa')
                    ->sortable(),

                Tables\Columns\IconColumn::make('wil_admin')
                    ->label('Wilayah Administratif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jml_penduduk')
                    ->label('Jumlah Penduduk')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDesas::route('/'),
        ];
    }
}
