@if (Request::is('/'))
<header>
    <div class="container-fluid">
        @include('layouts._menu')
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-6 col-md-8 col-sm-9 col-xs-12">
                <div class="form-group box-search-index">
                    <h2 class="mb-4 font-weight-bold">Prenota Case ed <br> esperienze uniche.</h2>

                    <form method="POST" action="{{route('apartment.search')}}">
                        @csrf
                        @method('POST')
                        <label class="small-text-search" for="search_input">DOVE</label>
                        <input autocomplete="off" id="search_input" type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
                        <ul id="search_autocomplete"></ul>
                        <input id="lat" type="hidden" name="lat" value="">
                        <input id="lon" type="hidden" name="lon" value="">
                        <button id="search" type="submit">Cerca</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</header>
@else

@include('layouts._menu')
@endif