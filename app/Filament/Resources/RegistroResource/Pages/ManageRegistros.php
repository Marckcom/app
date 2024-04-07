<?php

namespace App\Filament\Resources\RegistroResource\Pages;

use App\Filament\Resources\RegistroResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRegistros extends ManageRecords
{
    protected static string $resource = RegistroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
