@extends('layouts.app')

@section('content')

    <div class='container'>
        <div class="row">
            <div class="col-12">
                
                <form action="{{route('host.update', $apartment)}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" name='title'  value="{{ $apartment->title }}">
                    </div>

                    <div class="form-group">
                        <label for="rooms">stanze</label>
                        <input type="number" class="form-control" name='rooms'  value="{{ $apartment->rooms }}">
                    </div>

                    <div class="form-group">
                        <label for="bathroom">bagni</label>
                        <input type="number" class="form-control" name='bathroom'  value="{{ $apartment->bathroom }}">
                    </div>

                    <div class="form-group">
                        <label for="square_meters">metri quadri</label>
                        <input type="number" class="form-control" name='square_meters'  value="{{ $apartment->square_meters }}">
                    </div>

                        <div class="form-group">
                        <label for="description">descrizione</label>
                        <textarea class="form-control" name='description' rows="3">{{ $apartment->description }}</textarea>
                    </div>

                    
                    <img src="{{$apartment->main_img}}" style="width: 300px" alt="">

                    <div class="form-group">
                        <label for="main_img" >Immagine</label>
                        <input type="file" class="form-control-file" name="main_img" accept="image/*">
                    </div>

                    <button type='submit'>Salva</button>

                </form>

            </div>
        </div>
    </div>

@endsection
