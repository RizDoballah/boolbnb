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
                    <form action="" method="get">
                        @csrf
                        @method('GET')
                        <h3>Ricerca alloggi</h3>
                        <input type="search" placeholder="Aggiungi una città o un indirizzo" name="autocomplete-regioni">
                        <button type="submit">Cerca</button>
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
