@extends('layouts.app')
@section('content')
@if (session('delete'))
<div class="alert alert-success">
    {{ session('delete') }}
</div>
@endif
<div class="container pt-5">
    <h1 class="mb-5">Gestisci i tuoi alloggi</h1>

    @if (!count($apartments))
    <h4 class="my-5">Non hai ancora inserito nessun annuncio</h4>
    @endif

    <div class="row">
        @foreach ($apartments as $apartment)

        <div class="col-lg-4 col-md-6 col-xs-12 my-5">
            <a href="{{route('home.show', $apartment)}}">
                <img class="apartment_img" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            </a>
            <h4 class="mt-3 mb-4">{{$apartment->title}}</h4>
            <form class="d-inline" action="{{route('host.destroy', $apartment)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn_main float-right">Elimina</button>
            </form>
            <a class="btn btn-edit float-right mr-2" href="{{ route('host.edit', $apartment) }}">Modifica</a>

        </div>



        @endforeach
    </div>
</div>
@endsection
