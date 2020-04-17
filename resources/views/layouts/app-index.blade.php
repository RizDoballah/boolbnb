@include('layouts._head')
<body>
    <div id="app" >
      <header>
        <div class="container-fluid">
          @include('layouts._menu')
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <h3>Ricerca alloggi</h3>
                <form method="POST" action="{{route('apartment.search')}}" >
                  @csrf
                  @method('POST')
                  <input id="search_input" type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
                  <input id="lat" type="hidden" name="lat" value="">
                  <input id="lon" type="hidden" name="lon" value="">
                  <button id="search" type="submit">Cerca</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </header>
      <main class="py-4">
            @yield('content')
      </main>

      <footer>

      </footer>

    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
