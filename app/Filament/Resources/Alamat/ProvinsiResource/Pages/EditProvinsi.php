<?php

namespace App\Filament\Resources\Alamat\ProvinsiResource\Pages;

use App\Filament\Resources\Alamat\ProvinsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvinsi extends EditRecord
{
    protected static string $resource = ProvinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
