@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 pt-5">
          <h1 class="mb-5">I miei messaggi</h1>

            @if (!count($messages) || !count($messages[0]))
                <h4 class="my-5">Non hai ricevuto nessun messaggio</h4>
            @endif

          @foreach ($messages as $apartment_messages)
            @foreach ($apartment_messages as $message)

              <div class="message my-5">
                  <div class="message_img">
                      <img src="{{asset('storage/' . $message->apartment->main_img)}}" alt="">
                  </div>

                  <div class="message_text">
                      <h6>{{$message->name}}</h6>
                      <time class="text-muted time">{{$message->created_at}}</time>
                  </div>

                  <div class="message_body">
                      <p>{{$message->body}}</p>
                      <i class="far fa-envelope"></i> <small class="email">Rispondi a <a class="email_link" href="mailto:{{$message->email}}">{{$message->email}}</a></small>
                  </div>
              </div>

            @endforeach
          @endforeach

        </div>
    </div>
</div>
@endsection
