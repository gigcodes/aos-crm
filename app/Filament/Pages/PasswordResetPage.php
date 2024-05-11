<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class PasswordResetPage extends Page
{
    use InteractsWithFormActions;

    protected static string $layout = 'filament-panels::components.layout.simple';

    protected static string $view = 'filament.pages.password-reset-page';

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('password')
                    ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.password.label'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->rule(PasswordRule::default())
                    ->same('passwordConfirmation')
                    ->validationAttribute(__('filament-panels::pages/auth/password-reset/reset-password.form.password.validation_attribute')),
                TextInput::make('passwordConfirmation')
                    ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.password_confirmation.label'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->dehydrated(false),
            ])
            ->statePath('data');
    }

    public function resetPassword()
    {
        $user = auth()->user();
        $data = $this->form->getState();

        $user->update([
            'password' => Hash::make($data['password']),
            'is_password_reset' => true,
        ]);

        session()->put([
            'password_hash_web' => $user->password,
        ]);

        Notification::make()
            ->title('Password')
            ->body('Updated successfully!')
            ->success()
            ->send();

        return redirect(Onboard::getUrl());
    }

    public function getTitle(): string|Htmlable
    {
        return __('filament-panels::pages/auth/password-reset/reset-password.title');
    }

    public function getHeading(): string|Htmlable
    {
        return __('filament-panels::pages/auth/password-reset/reset-password.heading');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('resetPassword')
                ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.actions.reset.label'))
                ->submit('resetPassword'),
        ];
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }

    public function hasLogo(): bool
    {
        return true;
    }

    protected function getLayoutData(): array
    {
        return [
            'hasTopbar' => false,
        ];
    }
}
