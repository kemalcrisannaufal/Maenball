@extends('layouts.mainLayout')

@section('content')
<div class="container mt-5">
    <h1 class="text-white">Highlight</h1>
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4 mt-3">
            <div class="card mb-3 h-100">
                <img class="card-img-top h-100" src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}" alt="{{ $video->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $video->title }}</h5>
                    <p class="card-text text-truncate">{{ $video->description }}</p>
                    <a href="/highlight/{{ $video->id }}"><button>Lihat Video</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
