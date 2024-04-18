@php
    $list_videos = $videos->reverse();
    $latest_video = $list_videos->first();
    $videos = $list_videos->slice(1);
@endphp

@extends('layouts.mainLayout')
@section('title', 'Highlight')
@section('css', '/css/highlight/highlight-main-style.css')
@section('js', '/js/highlight/highlight.js')
@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-like').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var videoId = button.data('video-id');
                var url = button.data('url');
                var iconLove = button.find('.icon-love');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        video_id: videoId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            iconLove.toggleClass(
                                'icon-love-liked');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + status + " " + error);
                    }
                });
            });
        });
    </script>
@endsection

@section('content')
    <img src="images/videonav.png" alt="">
    <div class="container mt-5 mb-5">
        <h1 class="mb-3 fs-3">Highlight</h1>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="/highlight/{{ $latest_video->id }}">
                        <img src="{{ asset('storage/videos/thumbnails/' . $latest_video->thumbnail) }}" alt=""
                            class="w-100">
                    </a>
                </div>
            </div>
        </div>
        <h1 class="fs-3 mt-5">Highlight Lainnya</h1>
        <div class="highlight-grid">
            @foreach ($videos as $video)
                <a href="/highlight/{{ $video->id }}" class="highlight" data-highlight-id="{{ $video->id }}">
                    <div class="video-box">
                        <img src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}" alt="{{ $video->title }}"
                            class="side-thumbnail">
                        <div class="highlight-title" data-highlight-id="{{ $video->id }}">
                            <p>{{ $video->title }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
