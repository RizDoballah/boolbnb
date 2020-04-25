@extends('layouts.app')
@section('content')


<div class="container pt-5">
  <h1 class="mb-5">Sponsorizza alloggi</h1>
    <div class="row">
      @foreach ($apartments as $apartment)
        <div class="col-3">
          <img class=" w-100" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
          <h5 class="my-3">{{$apartment->title}}</h5>
          <button class="btn btn_main w-100" data-toggle="modal" data-target="#exampleModalCenter" href="#">Sponsorizza</button>
        </div>
      @endforeach
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Scegli l'offerta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="offer24" id="offer24" value="option1" checked>
          <label class="form-check-label" for="offer24">
            2,99 € per 24 ore di sponsorizzazione
          </label>
        </div>
        <div class="form-check my-2">
          <input class="form-check-input" type="radio" name="offer72" id="offer72" value="option2">
          <label class="form-check-label" for="offer72">
            5.99 € per 72 ore di sponsorizzazione
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="offer144" id="offer144" value="option3">
          <label class="form-check-label" for="offer144">
            9.99 € per 144 ore di sponsorizzazione
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn_main">Vai al pagamento</button>
      </div>
    </div>
  </div>
</div>


@endsection
