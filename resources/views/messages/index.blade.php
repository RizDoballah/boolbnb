@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
          @foreach ($apartments as $apartment)
            @foreach ($apartment->messages as $message)
              <div class="message">
                <div class="message_img">
                  <img src="{{$message->apartment->main_img}}" alt="">
                </div>
                <div class="message_text">
                  <h5>{{$message->name}}</h5>
                  <time>{{$message->created_at}}</time>
                </div>
              <div class="message_body">{{$message->body}}</div>
            </div>


            @endforeach

          @endforeach
        @endsection


      </div>

    </div>

  </div>
