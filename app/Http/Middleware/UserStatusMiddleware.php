<?php

namespace App\Http\Middleware;

use App\Filament\Pages\Onboard;
use App\Filament\Pages\PasswordResetPage;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user needs password reset
            if (!$user->is_password_reset) {
                if (!$request->routeIs('filament.admin.pages.password-reset-page')) {
                    return redirect(PasswordResetPage::getUrl());
                }
            } else {
                // Redirect away from the password reset page if they're already reset
                if ($request->routeIs('filament.admin.pages.password-reset-page')) {
                    return redirect(Filament::getUrl()); // Redirect to homepage or dashboard
                }
            }

            // Check if the user needs onboarding
            if (!$user->is_onboarded) {
                if (!$request->routeIs('filament.admin.pages.onboard')) {
                    return redirect(Onboard::getUrl());
                }
            } else {
                // Redirect away from the onboarding page if they're already onboarded
                if ($request->routeIs('filament.admin.pages.onboard')) {
                    return redirect(Filament::getUrl()); // Redirect to homepage or dashboard
                }
            }
        }

        return $next($request);
    }
}
