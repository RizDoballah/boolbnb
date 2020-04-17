@extends('layouts.app')

@section('content')

    <div class='container'>
        <div class="row">
            <div class="col-12">

                <form method='POST' action="{{route('host.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name='title'  placeholder="inserisci un titolo" value="{{old('title')}}">
                        @error('title')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Indirizzo</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name='address'  placeholder="inserisci l'indirizzo" value="{{old('address')}}">
                        @error('address')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input id="lat" type="hidden" name="lat" value="">
                    <input id="lon" type="hidden" name="lon" value="">

                    <div class="form-group">
                        <label for="rooms">stanze</label>
                        <input min="1" type="number" class="form-control @error('rooms') is-invalid @enderror" name='rooms'  placeholder="inserisci un numero di stanza" value="{{old('rooms')}}">
                        @error('rooms')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="beds">letti</label>
                        <input min="1" type="number" class="form-control @error('beds') is-invalid @enderror" name='beds'  placeholder="inserisci numero letti" value="{{old('beds')}}">
                        @error('beds')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bathroom">bagni</label>
                        <input min="1" type="number" class="form-control @error('bathroom') is-invalid @enderror" name='bathroom'  placeholder="inserisci numero bagni" value="{{old('bathroom')}}">
                        @error('bathroom')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="square_meters">metri quadri</label>
                        <input min="1" type="number" class="form-control @error('square_meters') is-invalid @enderror" name='square_meters'  placeholder="inserisci metri quadrati" value="{{old('square_meters')}}">
                        @error('square_meters')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name='description' rows="3">{{old('description')}}</textarea>
                        @error('description')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="main_img" >Immagine</label>
                        <input type="file" class="form-control-file @error('main_img') is-invalid @enderror" name="main_img" accept="image/*" >
                        @error('main_img')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mr-4 text-bold d-block" for="tags">Servizi</label>
                        @foreach ($services as $service)
                        <input type="checkbox" name="services[]" value="{{$service->id}}">
                        <span class="mr-4">{{$service->name}}</span>
                        @endforeach
                    </div>

                    <div class="form-group mb-4">
                        <select name="published" >
                            <option value="1">Pubblicato</option>
                            <option value="0">Non Pubblicato</option>
                        </select>
                    </div>

                    <button id="save_apt" type='submit'>Salva</button>

                </form>

            </div>
        </div>
    </div>

@endsection
