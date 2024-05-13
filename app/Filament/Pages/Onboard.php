<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Contracts\Support\Htmlable;

class Onboard extends Page
{
    use InteractsWithFormActions;

    protected static string $layout = 'filament-panels::components.layout.simple';

    protected static string $view = 'filament.pages.onboard';

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                            // ...
                        ]),
                    Wizard\Step::make('Delivery')
                        ->schema([
                            // ...
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            // ...
                        ]),
                ]),
            ])
            ->statePath('data');
    }

    public function submit()
    {

    }

    public function getTitle(): string|Htmlable
    {
        return 'Onboard';
    }

    public function getHeading(): string|Htmlable
    {
        return 'Onboard';
    }

    public function hasLogo(): bool
    {
        return true;
    }

    protected function getLayoutData(): array
    {
        return [
            'hasTopbar' => false,
            'maxWidth' => MaxWidth::FiveExtraLarge,
        ];
    }
}
