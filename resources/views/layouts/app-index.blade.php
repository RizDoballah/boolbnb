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
                <input id="search_input" type="search" placeholder="Aggiungi una città o un indirizzo" name="autocomplete-regioni">
                <button id="search" name="search" type="submit">Cerca</button>
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
