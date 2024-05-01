@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('css', '/css/home/home-style.css')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div id="standings-web">
                    <p class="fw-bold fs-3 mb-3">Standings</p>
                    @for ($i = 0; $i < 8; $i++)
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Group A</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>Ga</th>
                                        <th>Gd</th>
                                        <th>Pts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Copenhagen</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>

                                    <tr>
                                        <td>Leicester City</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td>Vilareal</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>

                                    <tr>
                                        <td>Bayern</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endfor
                    <p class="fw-semibold fs-5">UEFA Champions League</p>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12" id="right-side">
                <p class="fw-bold fs-2 mb-3">Berita Terkini</p>
                <a href="/news/{{ $latest_news->first()->id }}">
                    <div class="news-homepage">
                        <img src="{{ '/storage/thumbnails/' . $latest_news->first()->thumbnail }}"
                            alt="{{ $latest_news->first()->title }}" class="img-news">
                    </div>
                </a>
                <h4 class="news-title-homepage">{{ $latest_news->first()->title }}</h4>
                <div class="schedule-section">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-bold fs-4">Next Match</p>
                        <a href="/schedule" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <div class="first-schedule-box">
                        <div class="d-flex justify-content-between align-items-center gap-5 w-100">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <img src="/images/madrid.png" alt="">
                                <p>Real Madrid</p>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-center gap-0">
                                <p class="mb-0">|</p>
                                <p class="mb-0">VS</p>
                                <p class="mb-0">|</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <img src="/images/barca.png" alt="">
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
                                    <img src="/images/madrid.png" alt="">
                                    <p>Real Madrid</p>
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center gap-0">
                                    <p class="mb-0">|</p>
                                    <p class="mb-0">VS</p>
                                    <p class="mb-0">|</p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <img src="/images/barca.png" alt="">
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
                    <p class="fw-bold fs-3 mb-3">Standings</p>
                    @for ($i = 0; $i < 8; $i++)
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Group A</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>Ga</th>
                                        <th>Gd</th>
                                        <th>Pts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Copenhagen</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>

                                    <tr>
                                        <td>Leicester City</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td>Vilareal</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>

                                    <tr>
                                        <td>Bayern</td>
                                        <td>10</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>21</td>
                                        <td>16</td>
                                        <td>33</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection
