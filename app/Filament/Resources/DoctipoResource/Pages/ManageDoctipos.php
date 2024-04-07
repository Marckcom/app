<?php

namespace App\Filament\Resources\DoctipoResource\Pages;

use App\Filament\Resources\DoctipoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDoctipos extends ManageRecords
{
    protected static string $resource = DoctipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
