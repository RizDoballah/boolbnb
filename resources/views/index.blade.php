@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="mb-5">Scopri intere case e stanze perfette per ogni viaggio</h1>
        </div>
        @foreach ($apartments as $apartment)
        <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img mb-2" src="{{asset($apartment->main_img)}}" alt="">
            </a>
            <h5 class="mb-5">{{$apartment->title}}</h5>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.partials._login-modal')
@include('layouts.partials._register-modal')


@endsection
