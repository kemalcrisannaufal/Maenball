<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('news.news', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('news.addNews');
    }

    public function store(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = "thumbnail".'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;

        $news = News::create($newData);
        return redirect('/addNews');
    }

    public function show($id)
    {
        $news = News::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }], 'users')->findOrFail($id);

        return view('news.newsDetail', [
            'news' => $news
        ]);
    }
}
