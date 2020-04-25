@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 py-5">
          <h1>I miei messaggi</h1>
          @foreach ($messages as $apartment_messages)
            @foreach ($apartment_messages as $message)

              <div class="message">
                  <div class="message_img">
                      <img src="{{asset('storage/' . $message->apartment->main_img)}}" alt="">
                  </div>

                  <div class="message_text">
                      <h5>{{$message->name}}</h5>
                      <small>{{$message->email}}</small>
                      <time>{{$message->created_at}}</time>
                  </div>

                  <div class="message_body">
                      {{$message->body}}
                  </div>
              </div>

            @endforeach
          @endforeach

        </div>
    </div>
</div>
@endsection
