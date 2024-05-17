<?php

namespace App\Console\Commands;

use App\Models\ClickUpUser;
use Illuminate\Console\Command;
use ClickUp\Client as ClickUpClient;
use ClickUp;

class ClickUpSyncCommand extends Command
{
    protected $signature = 'clickup:sync';

    protected $description = 'Sync ClickUp API data with the system';

    public function handle(): void
    {
        $options = new ClickUp\Options(config("services.clickup_api_key"));
        $clickUpClient = new ClickUpClient($options);

        $user = $clickUpClient->user();

        ClickUpUser::firstOrCreate([
            'click_up_id' => $user->extra()["click_up_id"]
        ],[
            'username' => $user->username(),
            'email' => $user->extra()['email'],
            'initials' => $user->initials(),
            'profile_picture' => $user->profilePicture(),
        ]);



    }
}
