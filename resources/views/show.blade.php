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
<div class="container-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-xs-12">
                <h1 class="h1_show_title">{{$apartment->title}}</h1>
                <small class="city-home ml-0"><i class="fas fa-map-marker-alt mr-1"></i>{{$apartment->city}}</small>
                <ul class="list-inline mt-3">
                    <li class="list-inline-item">{{$apartment->square_meters}} Mq</li>
                    <li class="list-inline-item"> {{$apartment->rooms}} Camere<i class="fas fa-door-open ml-2"></i></li>
                    <li class="list-inline-item">{{$apartment->bathroom}} Bagni <i class="fas fa-restroom ml-2"></i></li>
                    <li class="list-inline-item"></i>{{$apartment->beds}} Posto letto<i class="fas fa-bed ml-2"></i></li>
                </ul>
                <p>{{$apartment->description}}</p>
                <hr class="mt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mt-3 font-weight-bold">Servizi</h4>
                        @foreach ($apartment->services as $service)

                            @if ($service->name == 'Piscina')
                                <span class="mr-3"><i class="fas fa-swimming-pool mr-2"></i>{{$service->name}}</span>
                            @elseif($service->name == 'Sauna')
                                <span class="mr-3"><i class="fas fa-smog mr-2"></i>{{$service->name}}</span>
                            @elseif($service->name == 'Wi-fi')
                                <span class="mr-3"><i class="fas fa-wifi mr-2"></i>{{$service->name}}</span>
                            @elseif($service->name == 'Portineria')
                                <span class="mr-3"><i class="fas fa-concierge-bell mr-2"></i>{{$service->name}}</span>
                            @elseif($service->name == 'Posto macchina')
                                <span class="mr-3"><i class="fas fa-parking mr-2"></i>{{$service->name}}</span>
                            @elseif($service->name == 'Vista mare')
                                <span class="mr-3"><i class="fas fa-water mr-2"></i>{{$service->name}}</span>
                            @else 
                            <span class="mr-3">{{$service->name}}</span>
                            @endif

                        @endforeach
                    </div>
                </div>
                <hr class="my-4">
                <div class="box-show">
                    <h4 class="d-inline font-weight-bold">Ospitato da {{$apartment->user->name}}</h4>
                    <span class="ml-5">
                        <img class="avatar_show" src="{{$apartment->user->avatar}}" alt="">
                    </span>
                </div>
                
                @if($apartment->user_id != Auth::id())
                    <button type="button" class="mb-3 btn btn_show mt-5 mb-sm-5 mb-md-5 d-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Contatta l'host</button>
                @endif
                <a class="btn btn_main" href="{{URL::previous()}}">Torna indietro</a>

            </div>
    
            <div class="mt-sm-4 col-lg-5 col-md-12 col-xs-12">
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
                            <textarea class="form-control" cols="10" id="body"></textarea>
                        </div>
                        <input type="hidden" value="{{$apartment->id}}" id="id-apt" name="apartment_id">
                        <small id="errors" class="form-text text-danger"></small>
                    </div>
    
                    <div class="modal-footer">
                        <button id='send' type="button" class="btn btn_main">Invia</button>
                    </div>
    
                </div>
            </div>
        </div>
</div>


  @include('layouts.partials._login-modal')
  @include('layouts.partials._register-modal')

@endsection
