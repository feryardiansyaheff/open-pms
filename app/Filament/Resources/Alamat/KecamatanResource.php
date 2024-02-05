<?php

namespace App\Filament\Resources\Alamat;

use App\Filament\Resources\Alamat\KecamatanResource\Pages;
use App\Filament\Resources\Alamat\KecamatanResource\RelationManagers;
use App\Models\Alamat\Kecamatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KecamatanResource extends Resource
{
    protected static ?string $modelLabel = 'Kelola Kecamatan';
    protected static ?string $model = Kecamatan::class;
    protected static ?string $slug = 'kecamatan';

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Kelola Kecamatan';
    protected static ?string $navigationGroup = 'Master Data - Alamat';
    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kabupaten_id')
                    ->relationship('kabupaten', 'nm_kabupaten')
                    ->label('Kabupaten')
                    ->required()
                    ->searchable()
                    ->optionsLimit(5),

                Forms\Components\TextInput::make('nm_kecamatan')
                    ->label('Nama Kecamatan')
                    ->required()
                    ->maxLength(255),

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

                Tables\Columns\TextColumn::make('kabupaten.nm_kabupaten')
                    ->label('Kabupaten')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nm_kecamatan')
                    ->label('Nama Kecamatan')
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
            'index' => Pages\ListKecamatans::route('/'),
        ];
    }
}
