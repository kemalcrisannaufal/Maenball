@extends('layouts.mainLayout')

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





@endsection
