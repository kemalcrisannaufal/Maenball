@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('css', '/css/home/home-style.css')

@section('js', '/js/dashboard.js')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div id="standings-web">
                    <p class="fw-bold fs-3 mb-3">Standings</p>
                    @foreach ($standings as $value)
                    <div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Group {{$value[0]['group_name']}}</th>
                                        <th>Pts</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>Ga</th>
                                        <th>Gd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 4; $i++)
                                    <tr>
                                        <td>{{$value[$i]['name']}}</td>
                                        <td>{{$value[$i]['points']}}</td>
                                        <td>{{$value[$i]['won']}}</td>
                                        <td>{{$value[$i]['drawn']}}</td>
                                        <td>{{$value[$i]['lost']}}</td>
                                        <td>{{$value[$i]['goals_scored']}}</td>
                                        <td>{{$value[$i]['goals_conceded']}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-12" id="right-side">
                <p class="fw-bold fs-3 mb-3">Latest News</p>
                <div class="news-slider">
                    <button class="button prev">&#10094;</button>
                    <div class="news-wrapper">
                        @foreach ($latest_news as $news)
                            <div class="news-homepage">
                                <a href="/news/{{ $news->id }}">
                                    <img src="{{ '/storage/thumbnails/' . $news->thumbnail }}" alt="{{ $news->title }}"
                                        class="img-news">
                                </a>
                                <h4 class="news-title-homepage">{{ $news->title }}</h4>
                            </div>
                        @endforeach
                    </div>
                    <button class="button next">&#10095;</button>
                </div>

                <div class="schedule-section">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-bold fs-4">Next Match</p>
                        <a href="/schedule" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <div class="first-schedule-box">
                        <div class="d-flex justify-content-between align-items-center gap-5 w-100">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <img src="/images/madrid.png" alt="" width="40">
                                <p>Real Madrid</p>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-center gap-0">
                                <p class="mb-0">|</p>
                                <p class="mb-0">VS</p>
                                <p class="mb-0">|</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <img src="/images/barca.png" alt="" width="40">
                                <p>Barcelona</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <i class="fas fa-clock"></i>
                                <p>06.00 WIB</p>
                            </div>
                            <div class="stadium">
                                <div class="d-flex justify-content-center align-items-center gap-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>Camp Nou Stadium</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @for ($i = 0; $i < 4; $i++)
                        <div class="schedule-box">
                            <div class="d-flex justify-content-between align-items-center gap-5 w-100">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <img src="/images/madrid.png" alt="" width="40">
                                    <p>Real Madrid</p>
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center gap-0">
                                    <p class="mb-0">|</p>
                                    <p class="mb-0">VS</p>
                                    <p class="mb-0">|</p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <img src="/images/barca.png" alt="" width="40">
                                    <p>Barcelona</p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center gap-3">
                                    <i class="fas fa-clock"></i>
                                    <p>06.00 WIB</p>
                                </div>
                                <div class="stadium">
                                    <div class="d-flex justify-content-center align-items-center gap-3 location-stadium">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Camp Nou Stadium</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="highlight-section">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-bold fs-4">Highlights</p>
                        <a href="/highlight" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <div>
                        @foreach ($highlights as $highlight)
                            <a href="/highlight/{{ $highlight->id }}">
                                <div class="highlight-box">
                                    <img src="{{ asset('storage/videos/thumbnails/' . $highlight->thumbnail) }}"
                                        alt="{{ $highlight->title }}" class="highlight-thumbnail">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div id="standings-mobile">
                    <p class="fw-bold fs-4 mb-3">Standings</p>
                    @foreach ($standings as $value)
                    <div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Group {{$value[0]['group_name']}}</th>
                                        <th>Pts</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>Ga</th>
                                        <th>Gd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 4; $i++)
                                    <tr>
                                        <td>{{$value[$i]['name']}}</td>
                                        <td>{{$value[$i]['points']}}</td>
                                        <td>{{$value[$i]['won']}}</td>
                                        <td>{{$value[$i]['drawn']}}</td>
                                        <td>{{$value[$i]['lost']}}</td>
                                        <td>{{$value[$i]['goals_scored']}}</td>
                                        <td>{{$value[$i]['goals_conceded']}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
