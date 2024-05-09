<?php

namespace App\Handler;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class WebhookHandler extends ProcessWebhookJob
{
    public function handle(): void
    {
        try {
            DB::beginTransaction();
            $userData = $this->webhookCall->payload['data'] ?? null;

            if (! $userData) {
                DB::rollBack();

                return;
            }

            $user = User::firstOrCreate(['email' => $userData['email']], $userData);
            $user->assignRole('panel_user');
            DB::commit();
            event(new UserCreated($user));

        } catch (\Exception $exception) {
            info($exception->getMessage());
            DB::rollBack();
        }
    }
}
