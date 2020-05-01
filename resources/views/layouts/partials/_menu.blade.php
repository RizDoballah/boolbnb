<nav class="{{(Request::is('/')) ? 'navbar navbar-expand navbar-light menu-index px-md-5' : 'navbar navbar-expand navbar-light menu px-md-5' }}">
  <div class="container-fluid my-4 scrolled">
    <a class="navbar-brand" href="{{ url('/') }}">
      @include('layouts.partials._logo')
      {{-- <img class="logo" src="{{asset('img/logo.png')}}" alt="Airbnb logo"> --}}
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      </ul>
      ​@if (Request::is('apartment/search'))
      <form method="POST" action="{{route('apartment.search')}}">
        @csrf
        @method('POST')
        <input autocomplete="off" id="search_input" class="search_apartment_input" type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
        <ul id="search_autocomplete"></ul>
        <input id="lat" type="hidden" name="lat" value="">
        <input id="lon" type="hidden" name="lon" value="">
        <input id="city" type="hidden" name="city" value="">
        <button id="search" class="btn btn_main" type="submit">Cerca</button>
    </form>
      @endif

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link menu-link" data-toggle="modal" data-target="#exampleModalCenter" href="">Accedi</a>
        </li>

        @if (Route::has('register'))
            <li class="nav-item">
                <a data-toggle="modal" data-target="#register" class="nav-link menu-link" href="">Registrati</a>
            </li>

        @endif
        @else
            <li class="nav-item dropdown">
                @if (Request::is('host'))
                <a class="btn btn_create mr-4" href="{{route('host.create') }}">Crea un nuovo annuncio</a>
                @endif

                {{-- Button with avatar --}}
                <button type="button" id="navbarDropdown" class="button-host" data-toggle="dropdown">
                    <div class="button-text" aria-label="Menu di navigazione principale">Tu</div>
                    <div class="img-container">
                    <img class="avatar" src="{{Auth::user()->avatar}}" alt="">
                    </div>
                </button>
                {{-- end button with avatar --}}

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item mt-2" href="{{ route('host.index') }}">Gestisci alloggi</a>
                    <a class="dropdown-item mt-2" href="{{ route('sponsorships.index') }}">Sponsorizza alloggi</a>
                    <a class="dropdown-item mt-2" href="{{ route('messages.index') }}">Messaggi</a>
                    <hr>
                    <a class="dropdown-item mb-1" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Esci
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
                </a> --}}
            </li>
        @endguest
    </ul>
  </div>
</div>
</nav>
