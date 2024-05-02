@extends('layouts.mainLayout')

@section('title', 'Score')

@section('css', '/css/score/score-style.css')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="img-box">
                    <img src="images/score.png" alt="" class="img">
                    <div class="d-flex justify-content-center align-items-center gap-5 text-white" id="main-score">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="/images/madrid.png" alt="" width="70">
                            <p class="text-center fw-bold fs-4">Real Madrid</p>
                        </div>
                        <div class="text-center fw-bold fs-3">
                            <p>2 - 1</p>
                            <P>FULL TIME</P>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="/images/barca.png" alt="" width="70">
                            <p class="text-center fw-bold fs-4">Barcelona FC</p>
                        </div>
                    </div>
                    <div class="date-main-info">
                        <p>UEFA Champions League</p>
                        <p>SEPT 30 7.45 PM</p>
                    </div>
                    <div class="additional-main-info">
                        <div class="d-flex gap-3 align-items-center">
                            <i class="fas fa-trophy"></i>
                            <p>Semifinal</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <i class="far fa-clock  "></i>
                            <p>7.45 PM</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Camp Nou Stadium</p>
                        </div>
                    </div>
                </div>

                <div class="container mt-3">
                    <p class="fw-bold fs-3 mb-2 text-dark">Hasil Pertandingan Lain</p>
                    <div class="row">
                        <div class="col-md-6">
                            @for ($i = 0; $i < 2; $i++)
                                <div class="score-main-box">
                                    <div class="score-box">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="/images/barca.png" alt="" width="40">
                                            <p class="fw-bold fs-5">Barcelona</p>
                                        </div>
                                        <div>
                                            <p class="fw-bold fs-2">2-1</p>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="/images/madrid.png" alt="" width="40">
                                            <p class="fw-bold fs-5">Real Madrid</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 p-2">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="fas fa-trophy"></i>
                                            <p>Semifinal</p>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="far fa-clock  "></i>
                                            <p>7.45 PM</p>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>Camp Nou Stadium</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-6">
                            @for ($i = 0; $i < 2; $i++)
                                <div class="score-main-box">
                                    <div class="score-box">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="/images/barca.png" alt="" width="40">
                                            <p class="fw-bold fs-5">Barcelona</p>
                                        </div>
                                        <div>
                                            <p class="fw-bold fs-2">2-1</p>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="/images/madrid.png" alt="" width="40">
                                            <p class="fw-bold fs-5">Real Madrid</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 p-2">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="fas fa-trophy"></i>
                                            <p>Semifinal</p>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="far fa-clock  "></i>
                                            <p>7.45 PM</p>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>Camp Nou Stadium</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 d-flex justify-content-center">
                <div class="score-main-box">
                    <div class="img-box">
                        <img src="images/score.png" alt="" class="img">
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-5 text-white" id="main-score">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="/images/madrid.png" alt="" width="70">
                            <p class="text-center fw-bold fs-4">Real Madrid</p>
                        </div>
                        <div class="text-center fw-bold fs-3">
                            <p>2 - 1</p>
                            <P>FULL TIME</P>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="/images/barca.png" alt="" width="70">
                            <p class="text-center fw-bold fs-4">Barcelona FC</p>
                        </div>
                    </div>
                    <div class="date-main-info">
                        <p>UEFA Champions League</p>
                        <p>SEPT 30 7.45 PM</p>
                    </div>
                    <div class="additional-main-info">
                        <div class="d-flex gap-3 align-items-center">
                            <i class="fas fa-trophy"></i>
                            <p>Semifinal</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <i class="far fa-clock  "></i>
                            <p>7.45 PM</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Camp Nou Stadium</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 bg-success"></div>
            </div>
        </div>
    </div> --}}
@endsection
