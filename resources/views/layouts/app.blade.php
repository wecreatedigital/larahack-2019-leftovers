<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  {{-- TOASTR --}}
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/images/logo.svg" width="200px" alt="Leftovers">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('add-recipe') }}">{{ __('Add a Recipe') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('results') }}">{{ __('Find Recipes') }}</a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                  @if( !empty(Auth::user()->avatar))
                    <img src="{{ url(Auth::user()->avatar) }}" class="dropdown-toggle-avatar">
                  @endif

                  {{ Auth::user()->firstname }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="/profile"><i class="fas fa-user w-15"></i> Profile</a>
                  <a class="dropdown-item" href="/settings"><i class="fas fa-cog w-15"></i> Account Settings</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off w-15"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>

  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

</div>

</body>
</html>
