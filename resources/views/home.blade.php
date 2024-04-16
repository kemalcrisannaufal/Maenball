@extends('layouts.mainLayout')

@section('css', '/css/home/home-style.css')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="img-news-homepage">
                <img src="{{ '/storage/thumbnails/' . $latest_news->first()->thumbnail }}" alt="{{ $latest_news->first()->title }}" class="img-news">
            </div>
            <h4 class="news-title-homepage">{{ $latest_news->first()->title }}</h4>
        </div>
    </div>
</div>

@endsection
