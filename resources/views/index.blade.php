@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="mb-5">Scopri intere case e stanze perfette per ogni viaggi</h1>
            <h4 class="mb-3 font-weight-bold">Appartamenti in evidenza</h4>
        </div>
        @foreach ($apartmentsPlus as $apartment)
        <div class="col-lg-3 col-md-6 col-12">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img mb-2" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            </a>
            @if ($apartment->sponsorships->isNotEmpty())
              <span class="badge  plus">Plus</span>
            @endif
            <small>{{$apartment->city}}</small>
            <h5 class="mb-5 mt-2 ">{{$apartment->title}}</h5>
        </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="mb-3 font-weight-bold">Altri appartamenti</h4>
        </div>
        @foreach ($apartments as $apartment)
        <div class="col-lg-3 col-md-6 col-12">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img mb-2" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            </a>
            <small>{{$apartment->city}}</small>
            <h5 class="mb-5">{{$apartment->title}}</h5>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.partials._login-modal')
@include('layouts.partials._register-modal')


@endsection
