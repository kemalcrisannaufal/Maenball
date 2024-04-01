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
    <div class="container mt-3 mb-5">
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
                            <div class="d-flex gap-3">
                                <form action="/highlight/like/{{ $latest_video->id }}" method="POST">
                                    @php
                                        $isLiked = \App\Models\LikedVideo::where('user_id', auth()->id())
                                            ->where('video_id', $latest_video->id)
                                            ->exists();
                                    @endphp
                                    <button class="btn-like" data-video-id="{{ $latest_video->id }}"
                                        data-url="{{ route('video.like', ['id' => $latest_video->id]) }}" type="button">
                                        <i class="fas fa-heart {{ $isLiked ? 'icon-love-liked' : 'icon-love' }}"></i> Suka</button>
                                </form>
                                <button class="btn-liked-videos"><a href="/liked-videos">Liked Videos</a></button>
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
