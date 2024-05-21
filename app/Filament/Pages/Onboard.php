<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Concerns\HasMaxWidth;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;

class Onboard extends Page
{
    use HasMaxWidth;

    protected static string $layout = 'filament.layout.onboard-layout';

    protected static string $view = 'filament.pages.onboard';

    protected ?string $heading = 'Let\'s Onboard...';

    public function getMaxContentWidth(): MaxWidth|string|null
    {
        return MaxWidth::ThreeExtraLarge;
    }

    protected static bool $shouldRegisterNavigation = false;

    public function submit()
    {

    }

    public function hasLogo(): bool
    {
        return false;
    }
}
