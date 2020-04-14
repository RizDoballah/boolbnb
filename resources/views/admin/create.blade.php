@extends('layouts.app');
@section('content')
<div class='container'>
<div class="row">
<div class="col-12">
<form method=“POST”  >
                @csrf
                @method('POST')
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" name='title'  placeholder="inserisci un titolo">
  </div>
  <div class="form-group">
    <label for="rooms">stanze</label>
    <input type="number" class="form-control" name='rooms'  placeholder="inserisci un numero di stanza">
  </div>
  <div class="form-group">
    <label for="bathroom">bagni</label>
    <input type="number" class="form-control" name='bathroom'  placeholder="inserisci numero bagni">
  </div>
  <div class="form-group">
    <label for="square_meters">metri quadri</label>
    <input type="number" class="form-control" name='square_meters'  placeholder="inserisci metri quadrati">
  </div>
    <div class="form-group">
    <label for="description">descrizione</label>
    <textarea class="form-control" name='description' rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="main_img">Immagine</label>
    <input type="file" class="form-control-file" name="main_img">
  </div>
  <button type='submit'>Salva</button>
</form>

</div>
</div>
</div>

@endsection

