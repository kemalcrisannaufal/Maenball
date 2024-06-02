<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function news()
    {
        $news = News::get();
        return response()->json($news);
    }

    public function getAllHighlights()
    {
        $videos = Video::get();

        return response()->json($videos);
    }

    public function showHighlight($id)
    {
        $video = Video::findOrFail($id);
        $videos = Video::whereNotIn('id', [$id])->get();
        return response()->json(['video' => $video, 'videos' => $videos,]);
    }

    public function news_detail($id)
    {
        $news = News::with(['comments.replies.user' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }], 'admin')->findOrFail($id);
        return response()->json($news);
    }


    public function loginProcess(Request $request)
    {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);


    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json([
            'message' => 'success',
        ], 200);
    }

    return response()->json([
        'message' => 'failed',
        'errors' => [
            'email' => ['The provided credentials do not match our records.'],
        ],
    ], 401);
    }
}
