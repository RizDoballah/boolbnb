@extends('layouts.app')
@section('content')
{{-- @dd($apartments) --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 show_image">
            <a href="{{route('home.show', $apartment)}}">
                <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img" src="{{asset($apartment->main_img)}}" alt="">
                {{-- <img class="apartment_img" src="{{asset('storage/' . $apartment->main_img)}}" alt=""> --}}
            </a>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-7">
            <h1 class="h1_show_title">{{$apartment->title}}</h1>
            {{-- <small>{{$apartment->square_meters}}</small> --}}
            <ul class="list-inline">
                <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
                <li class="list-inline-item">{{$apartment->beds}} Letti </li>
                <li id="latValue">{{$apartment->lat}}</li>
                <li id="lonValue">{{$apartment->lon}}</li>
            </ul>
            <p>{{$apartment->description}}</p>

        </div>

        <div class="col-5">
            <h3>La posizione</h3>
            <div id='map' class='map_show'></div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4 class="mt-3">Servizi</h4>
            @foreach ($apartment->services as $service)
                <button type="button" class="btn btn-secondary btn-lg" disabled>{{$service->name}}</button>
            @endforeach
        </div>
    </div>

</div>

@endsection
