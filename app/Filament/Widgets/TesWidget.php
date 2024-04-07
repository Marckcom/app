<?php

namespace App\Filament\Widgets;

use App\Models\Doctipo;
use App\Models\Registro;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TesWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 6;
    protected function getStats(): array
    {
        return [
            Stat::make('Usuarios', User::count())
            ->description('Usuarios del sistema')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,4,5,10,20,50])
            ->color('success'),

            Stat::make('Documentos Registrados', Registro::count())
            ->description('Registrados')
            ->descriptionIcon('heroicon-m-rectangle-group', IconPosition::Before)
            ->chart([1,2,3,4,5,10,20,50])
            ->color('primary'),

            Stat::make('Tipo de Documentos', Doctipo::count())
            ->description('Registrados')
            ->descriptionIcon('heroicon-m-clipboard-document-check', IconPosition::Before)
            ->chart([1,2,3,4,5,10,20,50])
            ->color('danger')
        ];


    }
}
