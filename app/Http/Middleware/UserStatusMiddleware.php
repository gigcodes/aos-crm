<?php

namespace App\Http\Middleware;

use App\Filament\Pages\Onboard;
use App\Filament\Pages\PasswordResetPage;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();
        $passwordResetPage = 'filament.admin.pages.password-reset-page';
        $onboardPage = 'filament.admin.pages.onboard';

        // Prioritize redirect to password reset page if user not completed both password reset and onboard
        if (! $user->is_password_reset && ! $user->is_onboarded) {
            if (! $request->routeIs($passwordResetPage)) {
                return redirect(PasswordResetPage::getUrl());
            }
        }

        if ($user->is_password_reset || $user->is_onboarded) {
            // Redirect to the password reset page if it's not completed and not already on that page
            if (! $user->is_password_reset && ! $request->routeIs($passwordResetPage)) {
                return redirect(PasswordResetPage::getUrl());
            }

            // Redirect away from the password reset page if it's already completed
            if ($user->is_password_reset && $request->routeIs($passwordResetPage)) {
                return redirect(Filament::getUrl());
            }

            // Redirect to the onboarding page if it's not completed and not already on that page
            if (! $user->is_onboarded && ! $request->routeIs($onboardPage)) {
                return redirect(Onboard::getUrl());
            }

            // Redirect away from the onboarding page if it's already completed
            if ($user->is_onboarded && $request->routeIs($onboardPage)) {
                return redirect(Filament::getUrl());
            }
        }

        return $next($request);
    }
}
