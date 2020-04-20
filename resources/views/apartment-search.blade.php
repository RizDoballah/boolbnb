@extends('layouts.app')
@section('content')
<div class="container-fluid coord" data-lat="{{$coord['lat']}}" data-lon="{{$coord['lon']}}" >
    <div class="row">

        <div class="col-5">
            <h1>Soggiorni a Milano</h1>

            <form method="GET" action="{{route('apartment.filter')}}">
            @csrf

            <div class="row my-4">
                <div class="col-md-6 col-sm-12">Camere <input class="d-block" name="camere" type="number"></div>
                <div class="col-md-6 col-sm-12">Letti <input class="d-block" name="letti" type="number"></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 col-sm-12">
                    {{-- <h3>Filtra</h3> --}}


                        <input type="hidden" name="lat" value="{{$coord['lat']}}">
                        <input type="hidden" name="lon" value="{{$coord['lon']}}">

                        <div class="form-check">
                            <input class="form-check-input" name="wifi" type="checkbox">
                            <label class="form-check-label" for="wifi">
                                Wi-Fi
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="piscina" type="checkbox">
                            <label class="form-check-label" for="piscina">
                                Piscina
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="posto-macchina" type="checkbox">
                            <label class="form-check-label" for="posto-macchina">
                                Posto macchina
                            </label>
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" name="sauna" type="checkbox">
                                <label class="form-check-label" for="sauna">
                                    Sauna
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="vista-mare" type="checkbox">
                                <label class="form-check-label" for="vista-mare">
                                    Piscina
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="portineria" type="checkbox">
                                <label class="form-check-label" for="portineria">
                                    Portineria
                                </label>
                            </div>
                        </div>
            </div>
            <div class="row mb-1">
                <div class="col-12">
                    <label for="km">Distanza</label>
                    <input type="range" name="km" min="1" max="120" value="20">
                </div>
            </div>
            <button class="mb-4" type="submit">Filtra</button>
        </form>

            @foreach ($result as $apartment)
            <div class="row">
            <div class="col-6">
                <a href="{{route('home.show', $apartment)}}">
                    <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img"
                        src="{{asset($apartment->main_img)}}" alt="">
                </a>
            </div>

            <div class="col-6">
                <h3>{{$apartment->title}}</h3>
                <ul class="list-inline">
                    <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                    <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                    <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
                    <li class="list-inline-item">{{$apartment->beds}} Letti </li>
                </ul>
                <div class="row">
                    <div class="col">
                        @foreach ($apartment->services as $service)
                        <button type="button" class="btn btn-secondary btn-lg" disabled>{{$service->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        </div>
        <div class="col-7">
            <div id='map' class='map_apartment_search'></div>
        </div>
    </div>
</div>
@endsection
