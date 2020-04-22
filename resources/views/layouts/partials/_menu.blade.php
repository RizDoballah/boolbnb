<nav class="{{(Request::is('/')) ? 'navbar navbar-expand navbar-light menu-index' : 'navbar navbar-expand navbar-light menu' }}">
  <div class="container-fluid my-4">
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
        <input autocomplete="off" id="search_input" class="" type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
        <ul id="search_autocomplete"></ul>
        <input id="lat" type="hidden" name="lat" value="">
        <input id="lon" type="hidden" name="lon" value="">
        <input id="city" type="hidden" name="city" value="">
        <button id="search" class="" type="submit">Cerca</button>
    </form>
      @endif
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link menu-link" href="{{route('login')}}">Accedi</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{route('register')}}">Registrati</a>
            </li>
        @endif
        @else
            <li class="nav-item dropdown">

                {{-- Button with avatar --}}
                <button type="button" id="navbarDropdown" class="button-host" data-toggle="dropdown">
                    <div class="button-text" aria-label="Menu di navigazione principale">Tu</div>
                    <div class="img-container">
                    <img class="avatar" src="{{Auth::user()->avatar}}" alt="">
                    </div>
                </button>
                {{-- end button with avatar --}}

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('host.index') }}">Gestisci alloggi</a>

                    <a class="dropdown-item" href="{{ route('messages.index') }}">Messaggi</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
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
