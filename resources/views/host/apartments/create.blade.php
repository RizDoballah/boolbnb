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
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name='title'
                        placeholder="inserisci un titolo" value="{{old('title')}}">
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Quante camere da letto possono utilizzare gli ospiti?</h4>
                    <label class="my-5 label_create" for="rooms">Camere</label>
                    <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
                    <input autocomplete="off" class='counter' name='rooms' type="number" min="1"
                        value="{{(empty(old('rooms'))) ? '0' : old('rooms')}}" />
                    <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
                    @error('rooms')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Quanti letti possono utilizzare gli ospiti?</h4>
                    <label class="my-5 label_create" for="beds">letti</label>
                    <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
                    <input autocomplete="off" class='counter' name="beds" type="number" min="1"
                        value="{{(empty(old('beds'))) ? '0' : old('beds')}}" />
                    <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
                    @error('beds')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Quanti bagni?</h4>
                    <label class="my-5 label_create" for="bathroom">Bagni</label>
                    <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
                    <input autocomplete="off" class='counter' name="bathroom" type="number" min="1"
                        value="{{(empty(old('bathroom'))) ? '0' : old('bathroom')}}" />
                    <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
                    @error('bathroom')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Quanto é grande il tuo allogio?</h4>
                    <label class="my-5 label_create" for="square_meters">Metri Quadri</label>
                    <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
                    <input autocomplete="off" class='counter' name="square_meters" type="number" min="1"
                        value="{{(empty(old('square_meters'))) ? '0' : old('square_meters')}}" />
                    <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
                    @error('square_meters')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <h4 class="mt-5 mb-3">Dove si trova il tuo alloggio?</h4>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name='address' placeholder="inserisci l'indirizzo" value="{{old('address')}}">
                @error('address')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <input id="lat" type="hidden" name="lat" value="">
                <input id="lon" type="hidden" name="lon" value="">
            </div>

            <div class="form-group">
                <h4 class="mt-5 mb-3">Descrivi il tuo alloggio agli ospiti</h4>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                    name='description' rows="5">{{old('description')}}</textarea>
                @error('description')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <h4 class="mt-5 mb-3">Aggiungi foto al tuo annuncio</h4>
                <input type="file" class="form-control-file @error('main_img') is-invalid @enderror" name="main_img"
                    accept="image/*">
                @error('main_img')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
                <div class="form-group icon">
                    <h4 class="mt-5 mb-3">Quali servizi metti a disposizione?</h4>
                    <div class="container">
                      <div class="row">
                        <div class="col-6">
                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Wi-fi"
                                        {{-- {{(!empty($data['services']) && in_array('Wi-fi', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">

                                    <i class="fas fa-wifi"></i> Wi-Fi
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Piscina"
                                        {{-- {{(!empty($data['services']) && in_array('Piscina', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">
                                    <i class="fas fa-swimming-pool"></i> Piscina
                                    <span class="checkmark"></span>
                            </div>

                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Posto macchina"
                                        {{-- {{(!empty($data['services']) && in_array('Posto macchina', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">
                                    <i class="fas fa-parking"></i> Posto macchina
                                    <span class="checkmark"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Sauna"
                                        {{-- {{(!empty($data['services']) && in_array('Sauna', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">

                                    <i class="fas fa-hot-tub"></i> Sauna
                                    <span class="checkmark"></span>
                            </div>

                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Vista mare"
                                        {{-- {{(!empty($data['services']) && in_array('Vista mare', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">

                                    <i class="fas fa-water"></i> Vista Mare
                                    <span class="checkmark"></span>
                            </div>

                            <div class="checkbox_filter">
                                <label class="container_checkbox">
                                    <input class="form-check-input" name="services[]" value="Portineria"
                                        {{-- {{(!empty($data['services']) && in_array('Portineria', $data['services'])) ? 'checked' : ''}} --}}
                                        type="checkbox">

                                    <i class="fas fa-concierge-bell"></i> Portineria
                                    <span class="checkmark"></span>
                            </div>
                        </div>




                    </div>
                        





                    @foreach ($services as $service)
                    <input type="checkbox" name="services[]" value="{{$service->id}}">
                    <span class="mr-4">{{$service->name}}</span>
                    @endforeach
                </div>
            </div>


            <div class="form-group">
                <select name="published">
                    <option value="1">Pubblicato</option>
                    <option value="0">Non Pubblicato</option>
                </select>
            </div>

            <button id="save_apt" type='submit'>Salva</button>
            </form>
        </div>
    </div>
</div>
  {{-- </div> --}}

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
