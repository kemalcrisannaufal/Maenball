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
    <div class="container mt-5 mb-5">
        <h1 class="mb-3">Highlight</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="main-video-container">
                    <div class="main-video-box">
                        <iframe src="{{ $video->url }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="main-video"></iframe>
                    </div>
                    <div class="main-video-description">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $video->title }}</h1>
                            <div class="d-flex gap-3">
                                <form action="/highlight/like/{{ $video->id }}" method="POST">
                                    @php
                                        $isLiked = \App\Models\LikedVideo::where('user_id', auth()->id())
                                            ->where('video_id', $video->id)
                                            ->exists();
                                    @endphp
                                    <button class="btn-like" data-video-id="{{ $video->id }}"
                                        data-url="{{ route('video.like', ['id' => $video->id]) }}" type="button">
                                        <i class="fas fa-heart {{ $isLiked ? 'icon-love-liked' : 'icon-love' }}"></i> Suka
                                    </button>
                                </form>
                                <button class="btn-liked-videos"><a href="/liked-videos">Liked Videos</a></button>
                            </div>
                        </div>
                        <p>{{ $video->description }}</p>
                    </div>

                </div>
            </div>


        </div>

        <h1 class="fs-2 mt-3">Highlight Lainnya</h1>

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


{{-- @extends('layouts.mainLayout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div>
                <iframe width="100%" height="500" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div>
                    <h1>{{ $video->title }}</h1>
                    <p>{{ $video->description }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            @foreach ($videos as $video)
            <div class="card mb-3">
                <img class="card-img-top" src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}" alt="{{ $video->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $video->title }}</h5>
                </div>
                <a href="/highlight/{{ $video->id }}"><button>Lihat Video</button></a>
            </div>
            @endforeach
        </div>
    </div>
</div>





@endsection --}}
