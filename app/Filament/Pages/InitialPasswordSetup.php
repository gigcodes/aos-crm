<?php

namespace App\Filament\Pages;

use App\Http\Responses\InitialPasswordSetupResponse;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class InitialPasswordSetup extends Page
{
    use InteractsWithFormActions;

    protected static string $layout = 'filament-panels::components.layout.simple';

    protected static string $view = 'filament.pages.initial-password-setup';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        if (Filament::auth()->check() && auth()->user()->is_onboarded) {
            redirect()->intended(Filament::getUrl());
        }
    }

    public function resetPassword()
    {
        $user = auth()->user();
        $data = $this->form->getState();

        $user->update([
            'password' => Hash::make($data['password']),
            'is_password_reset' => true,
        ]);

        Notification::make()
            ->title('Password')
            ->body('Updated successfully!')
            ->success()
            ->send();

        return app(InitialPasswordSetupResponse::class);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.password.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->rule(PasswordRule::default())
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::pages/auth/password-reset/reset-password.form.password.validation_attribute'));
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.password_confirmation.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->dehydrated(false);
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
            $this->getResetPasswordFormAction(),
        ];
    }

    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')
            ->label(__('filament-panels::pages/auth/password-reset/reset-password.form.actions.reset.label'))
            ->submit('resetPassword');
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
