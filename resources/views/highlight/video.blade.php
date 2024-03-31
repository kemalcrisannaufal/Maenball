@php
    $list_videos = $videos->reverse();
    $latest_video = $list_videos->first();
    $videos = $list_videos->slice(1);
@endphp

@extends('layouts.mainLayout')

@section('title', 'Highlight')

@section('css', '/css/highlight/highlight-main-style.css')

@section('content')
    <div class="container mt-5">
        <h1 class="text-white fs-2">Highlight</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="main-video-container">
                    <div class="main-video-box">
                        <iframe src="{{ $latest_video->url }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="main-video"></iframe>
                    </div>
                    <div class="main-video-description">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $latest_video->title }}</h1>
                            <div>
                                <button><i class="fas fa-heart"></i>Suka</button>
                            </div>
                        </div>
                            <p>{{ $latest_video->description }}</p>
                    </div>

                </div>
            </div>


        </div>
        <hr>
        <h1 class="fs-2 text-white">Highlight Lainnya</h1>

        <div class="highlight-grid">
            @foreach ($videos as $video)
                <a href="/highlight/{{ $video->id }}">
                    <div class="side-video-box">
                        <img src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}"
                            alt="{{ $video->title }}" class="side-thumbnail">
                    </div>
                </a>
            @endforeach
        </div>


    </div>
@endsection
