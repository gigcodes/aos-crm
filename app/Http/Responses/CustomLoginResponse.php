<?php

namespace App\Http\Responses;

use App\Filament\Pages\InitialPasswordSetup;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\LoginResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class CustomLoginResponse extends LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        if ($request->user()->is_onboarded) {
            return redirect()->intended(Filament::getUrl());
        }
        return redirect(InitialPasswordSetup::getUrl());
    }
}
