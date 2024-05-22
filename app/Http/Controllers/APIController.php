<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getData()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://livescore-api.com/api-client/fixtures/matches.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244');
        $data = json_decode($response->getBody(), true);
        dd($data);
        return view('test', ['data' => $data['data']['table']]);

    }
}
