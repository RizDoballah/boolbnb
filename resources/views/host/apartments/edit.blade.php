@extends('layouts.app')

@section('content')
  <div class='container'>
    <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 ">
            <form method='POST' action="{{route('host.update', $apartment->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica il titolo del tuo annuncio</h4>
              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name='title' value="{{$apartment->title}}">
              @error('title')
                <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>

            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica il numero di camere</h4>
              <label class="my-3 label_create" for="rooms">Camere</label>
              <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
              <input  autocomplete="off" class="counter @error('rooms') is-invalid @enderror" min="1" type="number" name="rooms" value="{{$apartment->rooms}}">
              <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
              @error('rooms')
                <small class="form-text text-danger">{{$message}}</small>
              @enderror
              </div>

            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica il numero di letti</h4>
              <label class="my-3 label_create" for="beds">Letti</label>
              <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
              <input  autocomplete="off" class="counter @error('beds') is-invalid @enderror" min="1" type="number" name="beds" value="{{$apartment->beds}}">
              <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
              @error('beds')
                <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>

            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica il numero di bagni</h4>
              <label class="my-3 label_create" for="bathroom">Bagni</label>
              <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
              <input  autocomplete="off" class="counter @error('bathroom') is-invalid @enderror" min="1" type="number" name="bathroom" value="{{$apartment->bathroom}}">
              <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
              @error('bathroom')
                <small class="form-text text-danger">{{$message}}</small>
              @enderror
              </div>

              <div class="form-group">
                <h4 class="mt-5 mb-3">Modifica la metratura del tuo allogio</h4>
                <label class="my-3 label_create" for="square_meters">metri quadri</label>
                <span class='down_count btn' title='Down'><i class="fas fa-minus"></i></span>
                <input  autocomplete="off" class="counter @error('square_meters') is-invalid @enderror" min="1" type="number" name="square_meters" value="{{$apartment->square_meters}}">
                <span class='up_count btn' title='Up'><i class="fas fa-plus"></i></span>
                  @error('square_meters')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <h4 class="mt-5 mb-3">Modifica l'indirizzo del tuo allogio</h4>
                  <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name='address' value="{{$apartment->address}}">
                    @error('address')
                      <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <input id="lat" type="hidden" name="lat" value="{{$apartment->lat}}">
                  <input id="lon" type="hidden" name="lon" value="{{$apartment->lon}}">
                  <input id="city_address" type="hidden" name="city" value="{{$apartment->city}}">
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica la descrizione del tuo alloggio</h4>
              <textarea id="description" class="form-control @error('description') is-invalid @enderror" name='description' rows="5">{{$apartment->description}}</textarea>
              @error('description')
                <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>

            <div class="form-group">
              <h4 class="mt-5 mb-3">Modifica la foto del tuo annuncio</h4>
                @isset($apartment->main_img)
                  <img class="d-block mb-3 apartment_img" src="{{asset('storage/' . $apartment->main_img)}}" style="width: 300px" alt="">
                @endisset
              <div class="upload-btn-wrapper">
                <button type="submit" class="btn_foto"><i class="fas fa-cloud-upload-alt"></i> Modifica foto</button>
                <input id="file-upload"  type="file" class="form-control-file @error('main_img') is-invalid @enderror" name="main_img" accept="image/*" >
                  <label id="file-name"></label>
                @error('main_img')
                  <small class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-group icon">
              <h4 class="mt-5 mb-3">Modifica i servizi del tuo allogio</h4>
              <div class="container services_create">
                <div class="row">
                  <div class="col-6">
                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="1"
                        {{($apartment->services->contains(1) ? 'checked' : '')}}
                        type="checkbox">
                        <i class="fas fa-wifi"></i> Wi-Fi
                        <span class="checkmark"></span>
                      </label>
                    </div>

                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="3"
                        {{($apartment->services->contains(3) ? 'checked' : '')}}
                        type="checkbox">
                        <i class="fas fa-swimming-pool"></i> Piscina
                        <span class="checkmark create"></span>
                      </label>
                    </div>

                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="2"
                        {{($apartment->services->contains(2) ? 'checked' : '')}}
                        type="checkbox">
                        <i class="fas fa-parking"></i> Posto macchina
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="checkbox_filter">
                      <label class="container_checkbox">
                        <input class="form-check-input" name="services[]" value="5"
                        {{($apartment->services->contains(5) ? 'checked' : '')}}
                        type="checkbox">
                        <i class="fas fa-hot-tub"></i> Sauna
                        <span class="checkmark"></span>
                      </label>
                      </div>

                      <div class="checkbox_filter">
                        <label class="container_checkbox">
                          <input class="form-check-input" name="services[]" value="6"
                          {{($apartment->services->contains(6) ? 'checked' : '')}}
                          type="checkbox">
                          <i class="fas fa-water"></i> Vista Mare
                          <span class="checkmark"></span>
                        </label>
                      </div>

                      <div class="checkbox_filter">
                        <label class="container_checkbox">
                          <input class="form-check-input" name="services[]" value="4"
                          {{($apartment->services->contains(4) ? 'checked' : '')}}
                          type="checkbox">
                          <i class="fas fa-concierge-bell"></i> Portineria
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="form-group">
              <select id="published" name="published">
                <option value="1" {{($apartment->published == 1) ? 'selected' : ''}}>Pubblicato</option>
                <option value="0" {{($apartment->published == 0) ? 'selected' : ''}}>Non pubblicato</option>
              </select>
            </div>
            <button id="save_apt" class="btn my-4 " type='submit'>Salva</button>
          </div>
        </form>
    </div>
  </div>

@endsection
