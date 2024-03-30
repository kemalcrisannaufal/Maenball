<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = News::latest()->get();
        return view('home', [
            'latest_news' => $latest_news
        ]);
    }
}
