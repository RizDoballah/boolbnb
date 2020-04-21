@extends('layouts.app')
@section('content')
{{-- @dd($apartments) --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 show_image">
            <a href="{{route('home.show', $apartment)}}">
                <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="apartment_img coord" src="{{asset($apartment->main_img)}}" alt="">
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
                {{-- <li id="latValue">{{$apartment->lat}}</li>
                <li id="lonValue">{{$apartment->lon}}</li> --}}
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

    {{-- Prova messaggi --}}

    {{-- <div class="row">
        <div class="col-6">
            <form>
                <div class="form-group my-5">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
    </div> --}}

    {{-- ***************************************** --}}

    <button type="button" class="btn btn-primary my-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Invia un messaggio</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


