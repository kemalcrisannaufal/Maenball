@extends('layouts.mainLayout')

@section('css', '/css/home/home-style.css')



@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="img-box">
                <img src="{{ '/storage/thumbnails/' . $latest_news->first()->thumbnail }}" alt="{{ $latest_news->first()->title }}" class="img-news">
            </div>
        </div>
    </div>
</div>

@endsection
