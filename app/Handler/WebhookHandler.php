<?php

namespace App\Handler;

use App\Models\User;
use App\Notifications\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class WebhookHandler extends ProcessWebhookJob
{
    public function handle(): void
    {
        try {
            DB::beginTransaction();
            $userData = $this->webhookCall->payload['data'] ?? null;

            if (!$userData) {
                DB::rollBack();

                return;
            }
            $temporaryPassword = Str::random(10);
            $dataExists = User::where('email', $userData['email'])->exists();

            if (!$dataExists) {
                $user = User::firstOrCreate(['email' => $userData['email']], [...$userData, 'password' => Hash::make($temporaryPassword)]);
                $user->assignRole('panel_user');
                DB::commit();
                $user->notify(new LoginRequest($temporaryPassword));
            }

        } catch (\Exception $exception) {
            info($exception->getMessage());
            DB::rollBack();
        }
    }
}
