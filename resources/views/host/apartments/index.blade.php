@extends('layouts.app')
@section('content')
@if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <a class="btn btn-info float-right" href="{{ route('host.create') }}">Crea un nuovo annuncio</a>
        </div>
        

    </div>
    <div class="row">
            @foreach ($apartments as $apartment)
        <div class="col-4">
            <a href="{{route('host.show', $apartment)}}">
                <img class="apartment_img" src="{{asset($apartment->main_img)}}" alt="">
            </a>
            <h3>{{$apartment->title}}</h3>

            
            <a class="btn btn-outline-dark" href="{{ route('host.edit', $apartment) }}">Modifica</a>

            <form class=" d-inline" action="{{route('host.destroy', $apartment)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Cancella</button>
            </form>
        </div>



        @endforeach
    </div>
</div>
@endsection
