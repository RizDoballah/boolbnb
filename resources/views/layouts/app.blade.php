@include('layouts._head')

<body>
    <div id="app">
        @include('layouts._menu')

      <main class="py-4">
            @yield('content')
      </main>

      <footer>

      </footer>

    </div>
</body>
</html>
