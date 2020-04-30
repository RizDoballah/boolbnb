@extends('layouts.app')
@section('content')
<div class="container-fluid coord" data-lat="{{$coord['lat']}}" data-lon="{{$coord['lon']}}" >
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h1 class="pt-5">Soggiorni a {{$coord['city']}}</h1>
         <form method="GET" action="{{route('apartment.filter')}}">
         @csrf

            <div class="row my-4">
                <div class="col-md-6 col-sm-12">Camere <input min='1' value='{{(!empty($data['rooms'])) ? $data['rooms'] : ''}}' class="d-block" name="rooms" type="number"></div>
                <div class="col-md-6 col-sm-12">Letti <input min='1' value='{{(!empty($data['beds'])) ? $data['beds'] : ''}}' class="d-block" name="beds" type="number"></div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 col-sm-12">

                    <input type="hidden" name="lat" value="{{$coord['lat']}}">
                    <input type="hidden" name="lon" value="{{$coord['lon']}}">
                    <input type="hidden" name="city" value="{{$coord['city']}}">

                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="Wi-fi" {{(!empty($data['services']) && in_array('Wi-fi', $data['services'])) ? 'checked' : ''}} type="checkbox">

                        <i class="fas fa-wifi"></i> Wi-Fi
                        <span class="checkmark"></span>
                      </label>
                    </div>

                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="Piscina" {{(!empty($data['services']) && in_array('Piscina', $data['services'])) ? 'checked' : ''}} type="checkbox">
                          <i class="fas fa-swimming-pool"></i> Piscina
                          <span class="checkmark"></span>
                    </div>

                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input
                            class="form-check-input"
                            name="services[]"
                            value="Posto macchina"{{(!empty($data['services']) && in_array('Posto macchina', $data['services'])) ? 'checked' : ''}}
                            type="checkbox"
                        >
                            <i class="fas fa-parking"></i>  Posto macchina
                            <span class="checkmark"></span>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <div class="checkbox_filter">
                          <label class="container_checkbox">
                            <input class="form-check-input" name="services[]" value="Sauna" {{(!empty($data['services']) && in_array('Sauna', $data['services'])) ? 'checked' : ''}} type="checkbox">

                                <i class="fas fa-hot-tub"></i> Sauna
                                <span class="checkmark"></span>
                        </div>

                        <div class="checkbox_filter">
                            <label class="container_checkbox">
                                <input class="form-check-input" name="services[]" value="Vista mare"
                                    {{(!empty($data['services']) && in_array('Vista mare', $data['services'])) ? 'checked' : ''}}
                                    type="checkbox">

                                <i class="fas fa-water"></i> Vista Mare
                                <span class="checkmark"></span>
                        </div>

                        <div class="checkbox_filter">
                          <label class="container_checkbox">
                            <input class="form-check-input" name="services[]" value="Portineria" {{(!empty($data['services']) && in_array('Portineria', $data['services'])) ? 'checked' : ''}} type="checkbox">

                              <i class="fas fa-concierge-bell"></i> Portineria
                              <span class="checkmark"></span>
                        </div>

                    </div>
            </div>
            <div class="row mb-1">
                <div class="col-12">

                    <div class="slidecontainer">
                        <p>Distanza in Km <span id="distanza_km" class="font-weight-bold"></span></p>
                        <input type="range" name="km" min="1" max="150" value="{{(!empty($km['km'])) ? $km['km'] : 20}}" class="slider" id="km">
                    </div>

                </div>
            </div>
            <button class="mt-4 mb-5 btn btn_main" type="submit">Filtra</button>

            </form>
            @if (empty($result))
              <h4>Nessun risultato</h4>
              <p>Prova a modificare la tua ricerca rimuovendo filtri o ampliando l'area nella mappa</p>
            @endif

            @foreach ($result as $apartment)
            <div class="row">
                <div class="col-5">
                    <a href="{{route('home.show', $apartment)}}">
                        <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img addPin"
                            src="{{asset('storage/' . $apartment->main_img)}}" alt="">
                    </a>
                </div>

                <div class="col-7">
                    @if ($apartment->sponsorships->isNotEmpty())
                        <span class="badge plus mb-2">Plus</span>
                    @endif
                    <h4 class='title_apartment'>{{$apartment->title}}</h4>
                    <ul class="list-inline">
                        <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                        <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                        <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
                        <li class="list-inline-item">{{$apartment->beds}} Letti </li>
                    </ul>
                    <ul class="list-inline">
                        @foreach ($apartment->services as $service)
                                <li class="list-inline-item">{{$service->name}}</li>
                        @endforeach
                    </ul>
                    <p><span class="dist_km">{{$apartment->dist}}</span> km da {{$coord['city']}}</p>

                </div>
            </div>

            <hr class="apartment_search_line">
            @endforeach

        </div>

        <div class="col-lg-7 col-md-12">
            <div id='map' class='map_apartment_search'></div>
        </div>

    </div>
</div>
@include('layouts.partials._login-modal')
@include('layouts.partials._register-modal')

@endsection
