@extends('layouts.app')
@section('content')
@if (session('delete'))
<div class="alert alert-success">
    {{ session('delete') }}
</div>
@endif
<div class="container pt-5">
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="col-4 mb-5">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            </a>
            <h4 class="mt-3 mb-4">{{$apartment->title}}</h4>
            <form class="d-inline" action="{{route('host.destroy', $apartment)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-dark float-right">Elimina</button>
            </form>
            <a class="btn btn-outline-dark float-right mr-2" href="{{ route('host.edit', $apartment) }}">Modifica</a>

        </div>



        @endforeach
    </div>
</div>
@endsection
