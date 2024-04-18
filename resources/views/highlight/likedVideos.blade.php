@extends('layouts.mainLayout')

@section('title', 'Liked Videos')

@section('css', '/css/highlight/liked-video-style.css')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-3 fs-2">Video Yang Anda Sukai</h1>
        <div class="d-flex gap-3">
            @foreach ($liked_videos as $video)
            <a href="/highlight/{{ $video->video->id }}">
                <div class="video-box">
                    <img src="{{ asset('storage/videos/thumbnails/' . $video->video->thumbnail) }}" alt="" class="video-thumbnail">
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
