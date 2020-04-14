@extends('layouts.app')
@section('content')
{{-- @dd($apartments) --}}
<div class="container">
    <div class="row">
            @foreach ($apartments as $apartment)
        <div class="col-4">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img" src="{{$apartment->main_img}}" alt="">
            </a>
            <h3>{{$apartment->title}}</h3>
        </div>
            @endforeach
    </div>
</div>
    
@endsection