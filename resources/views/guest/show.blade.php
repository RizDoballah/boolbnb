@extends('layouts.app')
@section('content')
{{-- @dd($apartments) --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img" src="{{$apartment->main_img}}" alt="">
            </a>
            <h1>{{$apartment->title}}</h1>
            {{-- <small>{{$apartment->square_meters}}</small> --}}
            <ul class="list-inline">
                <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
            </ul>
            <p>{{$apartment->description}}</p>

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