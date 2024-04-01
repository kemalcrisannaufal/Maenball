@extends('layouts.mainLayout')

@section('title', 'Liked Videos')

@section('css', '/css/highlight/highlight-main-style.css')

@section('content')
    <div class="container mt-3">
        <div class="d-flex gap-3">
            @foreach ($liked_videos as $video)
                <div class="card mb-3 col-md-4">
                    <img class="card-img-top" src="{{ asset('storage/videos/thumbnails/' . $video->video->thumbnail) }}"
                        alt="{{ $video->video->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $video->video->title }}</h5>
                    </div>
                    <a href="/highlight/{{ $video->video->id }}"><button>Lihat Video</button></a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
