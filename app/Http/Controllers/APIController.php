<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getData()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://livescore-api.com/api-client/scores/history.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244&from=2024-01-01');
        $data = json_decode($response->getBody(), true);


        $latest_match = array_slice($data, -1);
        $matches = array_slice($data, 0, count($data) - 1);

        return view('test', [
            'latest_match' => $latest_match,
            'matches' => $matches
        ]);

    }
}
