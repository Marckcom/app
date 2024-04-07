<?php

namespace App\Filament\Resources\PersonaldataResource\Pages;

use App\Filament\Resources\PersonaldataResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePersonaldatas extends ManageRecords
{
    protected static string $resource = PersonaldataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
