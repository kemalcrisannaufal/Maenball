@extends('layouts.mainLayout')

@section('title', 'Schedule')

@section('css', 'css/schedule/schedule-style.css')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="img-box">
                    <img src="images/schedule.png" alt="" class="img">
                    <div class="newest-schedule-match">
                        <p class="fw-bold fs-2 text-white mb-3">Pertandingan Mendatang</p>
                        <div class="d-flex justify-content-start align-items-center gap-5">
                            <img src="images/barca.png" alt="" class="img-club">
                            <p class="fw-bold fs-2 text-white">VS</p>
                            <img src="images/madrid.png" alt="" class="img-club">
                        </div>
                        <div class="d-flex justify-content-start align-items-center gap-5 mt-3">
                            <div class="d-flex align-items-center gap-3">
                                <i class="far fa-calendar"></i>
                                <p class="text-white">May 23, 2022</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <i class="far fa-clock"></i>
                                <p class="text-white"> 5.00 PM</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <i class="fas fa-map-marker-alt"></i>
                            <p >Camp Nou</p>
                        </div>
                        <div class="newest-schedule-clubname">
                            <p class="fw-bold fs-4 mb-3">Barcelona</p>
                            <p class="fw-bold fs-4">&nbsp;&nbsp;&nbsp;&nbsp;Real Madrid</p>
                        </div>
                    </div>

                </div>


                <h1 class="my-3 fs-3">Pertandingan Lainnya</h1>
                @for ($i = 0; $i < 5; $i++)
                    <div class="match-box"
                        style="background: linear-gradient(to left, rgba(0, 75, 117,  {{ 1 - $i * 0.05 }}), rgba(52, 61, 135,  {{ 1 - $i * 0.05 }}));">
                        <div>
                            <p class="fw-bold mb-1">Semifinal</p>
                            <div class="club-match-box">
                                <div class="item-box">
                                    <img src="images/barca.png" alt="" width="40">
                                    <p>Barcelona</p>
                                </div>
                                <div>
                                    <p>VS</p>
                                </div>
                                <div class="item-box">
                                    <img src="images/madrid.png" alt="" width="40">
                                    <p>Real Madrid</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-box">
                            <i class="far fa-clock"></i>
                            <p>5.00 PM</p>
                        </div>
                        <div class="item-box">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Camp Nou Stadium</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endsection
