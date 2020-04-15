@extends('layouts.app')
@section('content')
@if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif
<div class="container">
    <div class="row">
            @foreach ($apartments as $apartment)
        <div class="col-4">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img" src="{{asset($apartment->main_img)}}" alt="">
            </a>
            <h3>{{$apartment->title}}</h3>
        </div>

        @auth
            <form action="{{route('host.destroy', $apartment)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-dark float-right ">Delete</button>
            </form>
        @endauth
        @endforeach
    </div>
</div>
@endsection
