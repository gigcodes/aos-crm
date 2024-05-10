<?php

namespace App\Http\Responses;

use App\Filament\Pages\Onboard;
use Filament\Http\Responses\Auth\PasswordResetResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class InitialPasswordSetupResponse extends PasswordResetResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        return redirect()->intended(Onboard::getUrl());
    }
}
