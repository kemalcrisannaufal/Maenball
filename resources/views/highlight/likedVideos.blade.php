@extends('layouts.mainLayout')

@section('title', 'Liked Videos')

@section('css', '/css/highlight/liked-video-style.css')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-3 fs-2">Video Yang Anda Sukai</h1>
        <div class="d-flex gap-3">
            @if ($liked_videos->count() == 0)
            <div class="d-flex justify-content-center align-items-center w-100 p-5 text-white bg-primary">
                <p class="text-center">Tidak ada video yang anda sukai</p>
            </div>
            @else
                @foreach ($liked_videos as $video)
                    <a href="/highlight/{{ $video->video->id }}">
                        <div class="video-box">
                            <img src="{{ asset('storage/videos/thumbnails/' . $video->video->thumbnail) }}" alt=""
                                class="video-thumbnail">
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
