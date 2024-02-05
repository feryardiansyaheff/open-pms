<?php

namespace App\Filament\Resources\Alamat;

use App\Filament\Resources\Alamat\KabupatenResource\Pages;
use App\Filament\Resources\Alamat\KabupatenResource\RelationManagers;
use App\Models\Alamat\Kabupaten;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KabupatenResource extends Resource
{
    protected static ?string $modelLabel = 'Kelola Kabupaten';
    protected static ?string $model = Kabupaten::class;
    protected static ?string $slug = 'kabupaten';

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Kelola Kabupaten';
    protected static ?string $navigationGroup = 'Master Data - Alamat';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('provinsi_id')
                    ->relationship('provinsi', 'nm_provinsi')
                    ->label('Provinsi')
                    ->required()
                    ->searchable()
                    ->optionsLimit(5),

                Forms\Components\TextInput::make('nm_kabupaten')
                    ->label('Nama Kabupaten')
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

                Tables\Columns\TextColumn::make('provinsi.nm_provinsi')
                    ->label('Provinsi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nm_kabupaten')
                    ->label('Nama Kabupaten')
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
            'index' => Pages\ListKabupatens::route('/'),
        ];
    }
}
