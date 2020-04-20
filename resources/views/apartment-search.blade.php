@extends('layouts.app')
@section('content')
<div class="container-fluid coord" data-lat="{{$coord['lat']}}" data-lon="{{$coord['lon']}}" >
    <div class="row">

        <div class="col-6">

          <div class="filters">
            <h1>Display a Range Field</h1>
            <form action="/action_page.php">
              <label for="vol">Volume (between 0 and 50):</label>
              <input type="range" id="vol" name="vol" min="0" max="50">
              <input type="submit">
            </form>


          </div>

            @foreach ($result as $apartment)
            <div class="row">
            <div class="col-6">
                <a href="{{route('home.show', $apartment)}}">
                    <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img"
                        src="{{asset($apartment->main_img)}}" alt="">
                </a>
            </div>

            <div class="col-6">
                <h1>{{$apartment->title}}</h1>
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
        <div class="col-6">
            <div id='map' class='map_apartment_search'></div>
        </div>
    </div>
</div>
@endsection
