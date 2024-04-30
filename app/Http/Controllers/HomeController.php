<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = News::latest()->get();
        $highlights = Video::orderBy('created_at', 'desc')
                ->take(3)
                ->get();

        return view('home', [
            'latest_news' => $latest_news,
            'highlights' => $highlights
        ]);
    }
}
