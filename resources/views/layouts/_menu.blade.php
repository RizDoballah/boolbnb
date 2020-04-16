
  <nav class="navbar navbar-expand-md navbar-light ">
    <div class="container-fluid my-4">
      <a class="navbar-brand" href="{{ url('/') }}">
      <img class="logo" src="{{asset('img/logo.png')}}" alt="Airbnb logo">
      
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    ​
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        ​
      </ul>
      ​
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
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
