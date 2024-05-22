<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = News::latest()->take(3)->get();
        $highlights = Video::orderBy('created_at', 'desc')
                ->take(3)
                ->get();

        $client = new Client();
        $response = $client->request('GET', 'https://livescore-api.com/api-client/competitions/standings.json?competition_id=244&key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR');
        $data = json_decode($response->getBody(), true);

        // dd(count($data['data']['table']));
        $groupA = array_slice($data['data']['table'], 0, 4);
        $groupB = array_slice($data['data']['table'], 4, 8);
        $groupC = array_slice($data['data']['table'], 8, 12);
        $groupD = array_slice($data['data']['table'], 12, 16);
        $groupE = array_slice($data['data']['table'], 16, 20);
        $groupF = array_slice($data['data']['table'], 20, 24);
        $groupG = array_slice($data['data']['table'], 24, 28);
        $groupH = array_slice($data['data']['table'], 28, 32);

        $standings = [$groupA, $groupB, $groupC, $groupD, $groupE, $groupF, $groupG, $groupH];
        return view('home', [
            'latest_news' => $latest_news,
            'highlights' => $highlights,
            'standings' => $standings
        ]);
    }
}
