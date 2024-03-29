<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('highlight.video', [
            'videos' => $videos
        ]);
    }

    public function create()
    {
        return view('highlight.addVideo');
    }

    public function store(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $request->title.'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('videos/thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;

        $video = Video::create($newData);
        return redirect('/addVideo');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        $videos = Video::whereNotIn('id', [$id])->get();
        return view('highlight.videoDetail', [
            'video' => $video,
            'videos' => $videos
        ]);
    }
}
