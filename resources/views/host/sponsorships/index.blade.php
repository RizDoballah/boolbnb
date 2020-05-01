@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <h1 class="mb-5">Sponsorizza alloggi</h1>

    @if (!count($apartments))
        <h4 class="mb-5">Non hai ancora inserito nessun annuncio</h4>
    @endif
    <div class="row">
        
      @foreach ($apartments as $apartment)
        <div class="col-md-6 col-sm-6 col-lg-3 my-5">
          <img class="w-100 mb-3 apartment_img {{($apartment->sponsorships->isNotEmpty()) ? 'border_plus' : ''}}" src="{{asset('storage/' . $apartment->main_img)}}" alt="">
            @if ($apartment->sponsorships->isNotEmpty())
              <span class="badge plus">Plus</span>
            @endif
          <h6 data-id="{{$apartment->id}}" class=" d-inline">{{$apartment->title}}</h6>

          @if ($apartment->sponsorships->isEmpty())
            <a class=" btn_sponsorship sponsorship mt-2 d-block"data-toggle="modal" data-target="#exampleModalCenter" href="#">Sponsorizza<i class="fas fa-coins"></i></a>
          @endif

          </div>

      @endforeach
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Scegli l'offerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form class="" action="{{route('checkout')}}" method="post">
                @csrf
                @method('post')
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="price" id="offer24" value="2.99" checked>
                  <label class="form-check-label" for="offer24">
                    2,99 € per 24 ore di sponsorizzazione
                  </label>
                </div>
                <div class="form-check my-2">
                  <input class="form-check-input" type="radio" name="price" id="offer72" value="5.99">
                  <label class="form-check-label" for="offer72">
                    5.99 € per 72 ore di sponsorizzazione
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="price" id="offer144" value="9.99">
                  <label class="form-check-label" for="offer144">
                    9.99 € per 144 ore di sponsorizzazione
                  </label>
                </div>
                <input type="hidden" id="aptId" name="id" value="">
              </div>
              <div class="modal-footer">

                <button type="submit" class="btn btn_main">Vai al pagamento</button>

              </form>
            </div>
        </div>
    </div>
</div>


@endsection
