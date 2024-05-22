<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://livescore-api.com/api-client/fixtures/matches.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244');
        $data = json_decode($response->getBody(), true);
        $main_schedule =  $data['data']['fixtures'][0];
        $schedule = array_slice($data['data']['fixtures'], 1);
        return view('schedule.schedule', [
            'main_schedule' => $main_schedule,
            'schedule' => $schedule]);
    }
}
