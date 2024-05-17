<?php

namespace App\Http\Controllers;

use ClickUp\Client as ClickUpClient;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use ClickUp;
use Illuminate\Support\Facades\Log;

class ClickUpController extends Controller
{
    public ClickUpClient $clickUpClient;

    public function __construct()
    {
        $apiKey = config('services.clickup_api_key');
        $options = new ClickUp\Options($apiKey);
        $this->clickUpClient = new ClickUpClient($options);
    }

    public function getTasks()
    {
        try {
            $d = $this->clickUpClient->teams()->objects();
            $dd = $this->clickUpClient;
            $tasks = $this->clickUpClient->team(9016317366)->space(90161159490);
            $task = $this->clickUpClient->taskFinder(9016317366)->getCollection()->objects();
            Log::info(print_r($task, true));
            dd($d, $dd, $task, $tasks);

            return response()->json($tasks);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (GuzzleException) {
        }
    }

    public function Generate(int $teamId)
    {
        $team = $this->clickUpClient->team($teamId);

        logger($team);
    }


}
