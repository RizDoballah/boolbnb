@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 show_image">
            <a href="{{route('home.show', $apartment)}}">
                <img data-lat="{{$apartment->lat}}" data-lon="{{$apartment->lon}}" class="coord addPin w-100" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            </a>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-7 col-md-12 col-xs-12">
            <h1 class="h1_show_title">{{$apartment->title}}</h1>
            <small class="city-home">{{$apartment->city}}</small>
            <ul class="list-inline mt-3">
                <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                <li class="list-inline-item"> {{$apartment->rooms}} Camere</li>
                <li class="list-inline-item">{{$apartment->bathroom}} Bagni </li>
                <li class="list-inline-item">{{$apartment->beds}} Letti </li>
            </ul>
            <p>{{$apartment->description}}</p>
            <div class="row">
                <div class="col">
                    <h4 class="mt-3">Servizi</h4>
                    @foreach ($apartment->services as $service)
                        <button type="button" class="btn btn-secondary btn-lg" disabled>{{$service->name}}</button>
                    @endforeach
                </div>
            </div>
            @if($apartment->user_id != Auth::id())
                <button type="button" class="btn btn-primary my-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Invia un messaggio</button>
            @endif
        </div>

        <div class="col-lg-5 col-md-12 col-xs-12">
            <h3 class="font-weight-bold mb-3">La posizione</h3>
            <div id='map' class='map_show'></div>
        </div>
    </div>

</div>

    {{-- ***************************************** --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invia un messaggio al proprietario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="modal" class="modal-body">
                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Il tuo nome</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">La tua e-mail</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-form-label">Il tuo messaggio</label>
                        <textarea class="form-control" id="body"></textarea>
                    </div>
                    <input type="hidden" value="{{$apartment->id}}" id="id-apt" name="apartment_id">
                    <small id="errors" class="form-text text-danger"></small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                    <button id='send' type="button" class="btn btn-primary">Invia</button>
                </div>

            </div>
        </div>
    </div>

  @include('layouts.partials._login-modal')
  @include('layouts.partials._register-modal')

@endsection
