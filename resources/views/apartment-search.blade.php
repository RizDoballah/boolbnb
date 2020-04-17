@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
              @foreach ($result as $apartment)
                <img class="apartment_img" src="{{asset($apartment->main_img)}}" alt="">
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
              @endforeach
            </div>
        </div>
      </div>


@endsection
