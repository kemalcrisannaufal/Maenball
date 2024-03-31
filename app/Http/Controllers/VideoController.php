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
        return view('highlight.admin.addVideo');
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
        $newData['admin_id'] = auth()->user()->id;
        $video = Video::create($newData);
        return redirect('/list-highlight');
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

    public function list()
    {
        $videos = Video::with('admin')->get();
        return view('highlight.admin.listVideo', [
            'videos' => $videos
        ]);
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('highlight.admin.editVideo', [
            'video' => $video
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $fileName = $video->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = "thumbnail".'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('videos/thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;
        $newData['admin_id'] = auth()->user()->id;
        $video->update($newData);
        return redirect('/list-highlight');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect('/list-highlight');
    }
}
