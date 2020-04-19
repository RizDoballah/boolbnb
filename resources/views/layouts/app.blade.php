@include('layouts._head')
<body>
    <div id="app">
        @if (Request::is('/'))
        <header>
          <div class="container-fluid">
            @include('layouts._menu')
          </div>
          <div class="container">
            <div class="row mt-5 ml-5">
              <div class="col-11 offset-1">
                <div class="form-group box-search-index">
                  <h2 class="mb-4 font-weight-bold">Prenota Case ed <br> esperienze uniche.</h2>
                  <form method="POST" action="{{route('apartment.search')}}" >
                    @csrf
                    @method('POST')
                    <label class="small-text-search" for="search_input">DOVE</label>
                    <input autocomplete="off" id="search_input" list="search_autocomplete"  type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
                    <datalist id="search_autocomplete">
                    </datalist>
                    <input id="lat" type="hidden" name="lat" value="">
                    <input id="lon" type="hidden" name="lon" value="">
                    <button id="search" type="submit">Cerca</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </header>
        {{-- <form action="/action_page.php" method="get">
          <input autocomplete="off" list="search" name="browser">
         
          <input type="submit">
        </form> --}}
        @else
        @include('layouts._menu')
        @endif


      <main>
            @yield('content')
      </main>

      <footer>
        <div class="footer_top container">
          <div class="row">
            <div class="col-3">
              <ul class="footer_list">
                <li><h5 class="footer_titles">INFORMAZIONI</h5></li>
                <li>
                  <a href="#">Diversità e appartenenza</a>
                </li>
                <li>
                  <a href="#">Accessibilità</a>
                </li>
                <li>
                  <a href="#">Affidabilità e sicurezza</a>
                </li>
                <li>
                  <a href="#">Airbnb Citizen</a>
                </li>
                <li>
                  <a href="#">Newsroom</a>
                </li>
              </ul>
            </div>
              <div class="col-3">
                <ul class="footer_list">
                  <li><h5 class="footer_titles">COMMUNITY</h5></li>
                  <li>
                    <a href="#">Airbnb Magazine</a>
                  </li>
                  <li>
                    <a href="#">Airbnb for Work</a>
                  </li>
                  <li>
                    <a href="#">Invita degli amici</a>
                  </li>
                  <li>
                    <a href="#">Opportunità di lavoro</a>
                  </li>
                </ul>
              </div>
              <div class="col-3">
                <ul class="footer_list">
                  <li><h5 class="footer_titles">OSPITA</h5></li>
                  <li>
                    <a href="#">Diventa un host</a>
                  </li>
                  <li>
                    <a href="#">Proponi un'esperienza</a>
                  </li>
                  <li>
                    <a href="#">Affittare responsabilmente</a>
                  </li>
                  <li>
                    <a href="#">Open Homes</a>
                  </li>
                  <li>
                    <a href="#">Olimpiadi</a>
                  </li>
                  <li>
                    <a href="#">Centro risorse</a>
                  </li>
                </ul>
              </div>
              <div class="col-3">
                <ul class="footer_list">
                  <li><h5 class="footer_titles">ASSISTENZA</h5></li>
                  <li>
                    <a href="#">Centro Assistenza</a>
                  </li>
                  <li>
                    <a href="#">Servizio di assistenza di quartiere</a>
                  </li>
                  <li>
                    <a href="#">Affidabilità e sicurezza</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer_bottom container">
            <div class="text">
              <ul class="list-inline">
                <li class="list-inline-item"><h6>© 2020 Airbnb, Inc</h6></li>
                <li class="list-inline-item"><a href="#">All rights reserved</a></li>
                <li class="list-inline-item"><a href="#">Termini</a></li>
                <li class="list-inline-item"><a href="#">Mappa del sito</a></li>
                <li class="list-inline-item"><a href="#">Dettagli dell'azienda</a></li>
              </ul>
            </div>

          </div>
      </footer>
    </div>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

    {{-- @if (Request::is('apartment/search')) --}}
    {{-- @endif --}}

</body>
</html>
