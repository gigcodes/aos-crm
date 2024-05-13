<?php

namespace App\Http\Controllers;

use ClickUp\Client as ClickUpClient;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use ClickUp;

class ClickupController extends Controller
{
    private ClickUpClient $clickUpClient;

    public function __construct()
    {
//        $this->middleware('auth');  // Ensure user is authenticated if necessary
        $apiKey = config('app.clickup_api_key');
        $options = new ClickUp\Options($apiKey);
        $this->clickUpClient = new ClickUpClient($options);
    }

    public function getTasks()
    {
        try {
            $d= $this->clickUpClient->teams()->objects();
            $tasks = $this->clickUpClient->team(9016317366)->space(90161159490);
            dd($d);
            return response()->json($tasks);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (GuzzleException) {
        }
    }
    public static function Generate(int $teamId)
    {
        $options = new ClickUp\Options(config('app.clickup_api_key'));

        $client = new ClickUpClient($options);

        $team = $client->team($teamId);

        logger($team);
    }


}
