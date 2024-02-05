<?php

namespace App\Filament\Resources\Alamat\DesaResource\Pages;

use App\Filament\Resources\Alamat\DesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesa extends EditRecord
{
    protected static string $resource = DesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
