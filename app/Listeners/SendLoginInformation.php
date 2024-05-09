<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Notifications\LoginRequest;
use Illuminate\Support\Facades\Notification;

class SendLoginInformation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $user = $event->user;
        Notification::send($user, new LoginRequest());
    }
}
