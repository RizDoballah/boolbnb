@include('layouts.partials._head')
<body>
    <div id="app">
        @include('layouts.partials._header')

      <main class="{{ (Request::is('/')) ? '' : 'padding-top' }}">
            @yield('content')
      </main>

      @include('layouts.partials._footer')
    </div>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
