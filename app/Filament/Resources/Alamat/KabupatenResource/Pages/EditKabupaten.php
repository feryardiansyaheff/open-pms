<?php

namespace App\Filament\Resources\Alamat\KabupatenResource\Pages;

use App\Filament\Resources\Alamat\KabupatenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKabupaten extends EditRecord
{
    protected static string $resource = KabupatenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
