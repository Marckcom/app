<?php

namespace App\Filament\Resources\SituacionResource\Pages;

use App\Filament\Resources\SituacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSituacions extends ManageRecords
{
    protected static string $resource = SituacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
