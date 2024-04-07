<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\TesWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;

class InicioPanelProvider extends PanelProvider
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $modelLabel = 'CREAR REGISTRO';
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('inicio')
            ->path('inicio')
            ->login()
            ->plugins([
                FilamentBackgroundsPlugin::make()
                    ->imageProvider(
                        MyImages::make()
                            ->directory('/images/backgrounds')//curated-by-swis/
                    ),
            ])


            
            ->brandLogo(asset('/storage/images/digetic.png'))
            ->brandName('SISTEMA DE DIGITALIZACIÓN')
            ->brandLogoHeight('4rem')
            ->favicon(asset('/storage/images/digetic.png'))
            ->colors([
                'primary' => Color::Amber,
            ])

            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                TesWidget::class
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            
            ->profile()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
