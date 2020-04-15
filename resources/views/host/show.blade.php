{{-- @dd($apartment) --}}

@extends('layouts.app')
@section('content')
{{-- @dd($apartments) --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="apartment_img" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
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
</div>
    
@endsection
