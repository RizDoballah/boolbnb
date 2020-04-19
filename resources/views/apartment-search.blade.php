@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            @foreach ($result as $apartment)
            <a href="{{route('home.show', $apartment)}}">
                <img id="img_apartment_search" data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img" src="{{asset($apartment->main_img)}}" alt="">
            </a>
            <h1>{{$apartment->title}}</h1>
            <ul class="list-inline">
                <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
                <li class="list-inline-item">{{$apartment->beds}} Letti </li>
                <li id="latValue">{{$apartment->lat}}</li>
                <li id="lonValue">{{$apartment->lon}}</li>
            </ul>
            <div class="row">
                <div class="col">
                    @foreach ($apartment->services as $service)
                    <button type="button" class="btn btn-secondary btn-lg" disabled>{{$service->name}}</button>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-6">
            <div id='map' class='map_apartment_search'></div>
        </div>
    </div>
</div>
@endsection