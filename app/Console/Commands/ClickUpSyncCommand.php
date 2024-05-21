<?php

namespace App\Console\Commands;

use App\Models\ClickUpUser;
use ClickUp;
use ClickUp\Client as ClickUpClient;
use Illuminate\Console\Command;

class ClickUpSyncCommand extends Command
{
    protected $signature = 'clickup:sync';

    protected $description = 'Sync ClickUp API data with the system';

    public function handle(): void
    {
        $options       = new ClickUp\Options(config('services.clickup_api_key'));
        $clickupClient = new ClickUpClient($options);

        $user = $clickupClient->user();

        ClickUpUser::createOrFirst([
            'click_up_id' => $user->extra()['click_up_id'],
        ], [
            'username'        => $user->username(),
            'email'           => $user->extra()['email'],
            'initials'        => $user->initials(),
            'profile_picture' => $user->profilePicture(),
        ]);

    }
}
