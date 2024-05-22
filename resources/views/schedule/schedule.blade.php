@extends('layouts.mainLayout')

@section('title', 'Schedule')

@section('css', 'css/schedule/schedule-style.css')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                @if ($main_schedule != null)
                    @php
                        $utcTime = $main_schedule['date'] . ' ' . $main_schedule['time'];
                        $localTime = Carbon\Carbon::parse($utcTime)->setTimezone('Asia/Jakarta');
                        $time = explode(' ', $localTime);
                    @endphp <div class="img-box">
                        <img src="images/schedule.png" alt="" class="img">
                        <div class="newest-schedule-match">
                            <p class="fw-bold fs-2 text-white mb-3" id="title">Upcoming Match</p>
                            <div class="d-flex justify-content-start align-items-center gap-5">
                                {{-- <img src="images/barca.png" alt="" class="img-club"> --}}
                                <p class="fw-bold fs-4">{{ $main_schedule['home_name'] }}</p>
                                <p class="fw-bold fs-2 text-white">VS</p>
                                <p class="fw-bold fs-4">{{ $main_schedule['away_name'] }}</p>
                                {{-- <img src="images/madrid.png" alt="" class="img-club"> --}}
                            </div>
                            <div class="d-flex justify-content-start align-items-center gap-5 mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="far fa-calendar"></i>
                                    <p class="text-white">{{ $time[0] }}</p>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="far fa-clock"></i>
                                    <p class="text-white"> {{ $time[1] . ' WIB' }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>{{ $main_schedule['location'] }}</p>
                            </div>
                            <div id="newest-schedule-club">
                                {{-- <div class="newest-schedule-clubname">
                                    <p class="fw-bold fs-4 mb-3">{{ $main_schedule['home_name'] }}</p>
                                    <p class="fw-bold fs-4">&nbsp;&nbsp;&nbsp;&nbsp;{{ $main_schedule['away_name'] }}/p>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                @endif

                <h1 class="fw-bold fs-3 my-3">Other Matches</h1>
                @if (count($schedule) != 0)
                    @for ($i = 0; $i < 3; $i++)
                        @php
                            $utcTime = $schedule[$i]['date'] . ' ' . $schedule[$i]['time'];
                            $localTime = Carbon\Carbon::parse($utcTime)->setTimezone('Asia/Jakarta');
                            $time = explode(' ', $localTime);
                        @endphp <div class="match-box"
                            style="background: linear-gradient(to left, rgba(0, 75, 117,  {{ 1 - $i * 0.05 }}), rgba(52, 61, 135,  {{ 1 - $i * 0.05 }}));">
                            <div>
                                <div class="club-match-box">
                                    <div class="item-box">
                                        {{-- <img src="images/barca.png" alt="" width="40"> --}}
                                        {{-- <p>Barcelona</p> --}}
                                        <p class="fw-bold fs-4">{{ $schedule[$i]['home_name'] }}</p>
                                    </div>
                                    <div>
                                        <p>VS</p>
                                    </div>
                                    <div class="item-box">
                                        {{-- <img src="images/madrid.png" alt="" width="40"> --}}
                                        {{-- <p>Real Madrid</p> --}}
                                        <p class="fw-bold fs-4">{{ $schedule[$i]['away_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-box">
                                <i class="far fa-clock"></i>
                                <p>{{ $localTime . ' WIB' }}</p>
                            </div>
                            <div class="item-box">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>{{ $schedule[$i]['location'] }}</p>
                            </div>
                        </div>
                    @endfor
                @else
                <div class="d-flex justify-content-center align-items-center w-100 p-2" id="no-schedule">
                    <p class="text-center text-white fw-bold fs-4">Tidak ada jadwal</p>
                </div>
                @endif
            </div>
        </div>

    </div>
@endsection
