@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-6">
        <form method='POST' action="{{route('host.store')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <h4 class="mt-5 mb-3">Crea un titolo per il tuo annuncio</h4>
          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name='title'  placeholder="inserisci un titolo" value="{{old('title')}}">
          @error('title')
              <small class="form-text text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <h4 class="mt-4">Quante persone può ospitare il tuo alloggio?</h4>
          <label class="my-5 label_create" for="guest">Ospiti</label>
          <button class='down_count btn' title='Down'><i class="fas fa-minus"></i>
          </button>
          <input class='counter' type="text" value='0'/>
          <button class='up_count btn' title='Up'><i class="fas fa-plus"></i>
          </button>
        </div>
        <div class="form-group">
          <h4>Quante camere da letto possono utilizzare gli ospiti?</h4>
          <label class="my-5 label_create" for="rooms">Camere</label>
          <button class='down_count btn' title='Down'><i class="fas fa-minus"></i>
          </button>
          <input class='counter' type="text"  value='0' />
          <button class='up_count btn' title='Up'><i class="fas fa-plus"></i>
          </button>
        </div>
        <div class="form-group">
          <h4>Quanti letti possono utilizzare gli ospiti?</h4>
          <label class="my-5 label_create" for="beds">letti</label>
          <button class='down_count btn' title='Down'><i class="fas fa-minus"></i>
          </button>
          <input class='counter' type="text" value='0' />
          <button class='up_count btn' title='Up'><i class="fas fa-plus"></i>
          </button>
        </div>
        <div class="form-group">
          <h4>Quanti bagni?</h4>
          <label class="my-5 label_create" for="bathroom">Bagni</label>
          <button class='down_count btn' title='Down'><i class="fas fa-minus"></i>
          </button>
          <input class='counter' type="text" value='0' />
          <button class='up_count btn' title='Up'><i class="fas fa-plus"></i>
          </button>
        </div>
        <div class="form-group">
          <h4>Quanto é grande il tuo allogio?</h4>
          <label class="my-5 label_create" for="square_meters">Metri Quadri</label>
          <button class='down_count btn' title='Down'><i class="fas fa-minus"></i>
          </button>
          <input class='counter' type="text" value='0' />
          <button class='up_count btn' title='Up'><i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <h4 class="mt-5 mb-3">Dove si trova il tuo alloggio?</h4>
          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name='address'  placeholder="inserisci l'indirizzo" value="{{old('address')}}">
          @error('address')
            <small class="form-text text-danger">{{$message}}</small>
          @enderror
          <input id="lat" type="hidden" name="lat" value="">
          <input id="lon" type="hidden" name="lon" value="">
        </div>
        <div class="form-group">
          <h4 class="mt-5 mb-3">Descrivi il tuo alloggio agli ospiti</h4>
          <textarea id="description"class="form-control @error('description') is-invalid @enderror" name='description' rows="5">{{old('description')}}</textarea>
            @error('description')
              <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <h4 class="mt-5 mb-3">Aggiungi foto al tuo annuncio</h4>
            <input type="file" class="form-control-file @error('main_img') is-invalid @enderror" name="main_img" accept="image/*" >
            @error('main_img')
              <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <h4 class="mt-5 mb-3">Quali servizi metti a disposizione?</h4>
            @foreach ($services as $service)
              <input type="checkbox" name="services[]" value="{{$service->id}}">
              <span class="mr-4">{{$service->name}}</span>
            @endforeach
          </div>
          <div class="form-group">
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
  </div>

    {{-- <div class='container'>
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
    </div> --}}

@endsection
