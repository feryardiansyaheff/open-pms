<?php

namespace App\Filament\Resources\Alamat;

use App\Filament\Resources\Alamat\ProvinsiResource\Pages;
use App\Filament\Resources\Alamat\ProvinsiResource\RelationManagers;
use App\Models\Alamat\Provinsi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinsiResource extends Resource
{
    protected static ?string $modelLabel = 'Kelola Provinsi';
    protected static ?string $model = Provinsi::class;
    protected static ?string $slug = 'provinsi';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kelola Provinsi';
    protected static ?string $navigationGroup = 'Master Data - Alamat';
    protected static ?string $navigationIcon = 'heroicon-s-globe-asia-australia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nm_provinsi')
                    ->label('Nama Provinsi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('nm_provinsi')
                    ->label('Nama Provinsi')
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
            'index' => Pages\ListProvinsis::route('/'),
        ];
    }
}
