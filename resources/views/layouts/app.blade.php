<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Guilde de Legend of Mushroom</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap.bundle.js') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/Logo_ott.png') }}" alt="Logo de OnTheTop" style="height: 50px;">
                    Legend of Mushroom
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            @if(auth()->user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Gerer Guildes/Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users') }}">Gerer Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('onthetop.dashboard') }}">Guilds/Membres</a>
                            </li>
                            @elseif(auth()->user()->hasRole('onthetop'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('onthetop.dashboard') }}">Guilds/Membres</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <section class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-dark p-5" data-bs-theme="dark">
        <p class="col-md-4 mb-0 text-body-secondary">© 2024 OnTheTop Corp.</p>
    
        <a class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="{{ asset('images/Logo_ott.png') }}" alt="Logo de OnTheTop" style="height: 50px;">
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="https://discord.gg/V39nHjQrBW" class="nav-link px-2 text-body-secondary">Discord</a></li>
          <li class="nav-item"><a href="{{ route('support') }}" class="nav-link px-2 text-body-secondary">Support</a></li>
        </ul>
    </section>

</body>
</html>
