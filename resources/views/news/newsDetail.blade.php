@extends('layouts.mainLayout')

@section('title', $news->title)

@section('css', '/css/news/news-style.css')

@section('content')
    <div class="container mt-5 col-lg-7 col-md-7 col-sm-12 bg-light p-5">
        <div id="news">
            <h1 class="news-title-main">{{ $news->title }}</h1>
            <p class="news-date-main">{{ $news->created_at }}</p>
            <img src="{{ asset('storage/thumbnails/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="news-image-main">
            <p class="news-content-main">{!! nl2br(e($news->content)) !!}</p>
        </div>

        <div id="comments">
            <h1 class="comment-title-main">Tambahkan Komentar</h1>
            <div class="comment-input-box">
                <form action="/news-comment/{{ $news->id }}" method="POST" style="width: 100%" class="d-flex justify-content-center">
                    <div class="profile-picture-comment">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="profile-image-comment">
                    </div>
                    <input type="text" class="comment-input" placeholder="Tulis Komentar..." name="comment">
                    @csrf
                    <button class="comment-button"><i class="fas fa-paper-plane" style="height: 50px; width: 50px"></i> </button>
                </form>
            </div>

            <h1 class="comment-subtitle-main">Komentar</h1>
            @foreach ($news->comments as $comment)
            <div class="comment">
                <div class="profile-picture-comment">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="profile-image-comment">
                </div>
                <div class="comment-content-box">
                    <p class="comment-name">{{ $comment->users->name }}</p>
                    <p class="comment-content">{{ $comment->comment }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
