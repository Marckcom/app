<?php

namespace App\Filament\Resources\OrigenResource\Pages;

use App\Filament\Resources\OrigenResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOrigens extends ManageRecords
{
    protected static string $resource = OrigenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
