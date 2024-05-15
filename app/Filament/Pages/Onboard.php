<?php

namespace App\Filament\Pages;

use App\Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Concerns\HasMaxWidth;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class Onboard extends Page
{
    use InteractsWithFormActions, HasMaxWidth;

    protected static string $layout = 'filament.layout.onboard-layout';

    protected static string $view = 'filament.pages.onboard';

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('screen_one')
                        ->schema([
                            \Filament\Forms\Components\View::make('filament.onboard.screen-one')
                        ]),
                    Wizard\Step::make('screen_two')
                        ->schema([
                            \Filament\Forms\Components\View::make('filament.onboard.screen-two')
                        ]),
                    Wizard\Step::make('screen_three')
                        ->schema([
                            \Filament\Forms\Components\View::make('filament.onboard.screen-three')
                        ]),
                    Wizard\Step::make('screen_four')
                        ->schema([
                            Section::make('Profile')
                                ->description('User related information')
                                ->schema([
                                    TextInput::make('name'),
                                    TextInput::make('email'),
                                    TextInput::make('company'),
                                    TextInput::make('project'),
                                ])
                        ]),
                ])->submitAction(new HtmlString(
                        Blade::render(
                            <<<BLADE
                            <x-filament::button
                                type="submit"
                                size="sm"
                            >
                                Submit
                            </x-filament::button>
                            BLADE
                        ))),
            ])
            ->statePath('data');
    }

    public function submit()
    {

    }
}
