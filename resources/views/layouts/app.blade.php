<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeLoRegalo</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
  
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link  href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/logo.svg') }}" sizes="32x32" type="image/svg">
    <link rel="icon" href="{{ asset('assets/logo.svg') }}" sizes="16x16" type="image/svg">
</head>
<body>
        <!--Inicio Navbar -->
        <header>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light navbar-green shadow-sm sticky-top">
            <a class="navbar-brand" href="{{ url('/')}}" >
                teloregalo
                <img src="{{ asset('assets/logo.svg') }}" width="40" height="40" class="d-inline-block align-bottom" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto" id="menuNav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Comercios adheridos
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Preguntas frecuentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btnDonarNav">Donar</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item button">
                        <a href="{{ route('login.stores')}}" class="nav-link p-0 btn-navbar" >
                        Soy un comercio</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item button">
                            <a href="{{ route('login') }}" class="nav-link p-0 btn-navbar" >
                            Soy un héroe</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->rol == 'store')
                    <li> <a id="navbarDropdown" class="nav-link " href="{{ url('stores') }}" role="button">
                        Mi Comercio
                    </a></li>
                    @endif
                    <li class="nav-item dropdown">
                  
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::user()->avatar)
                                <img class="rounded-circle" src="{{ Auth::user()->avatar }}" alt="avatar" width="40" height="40" style="margin-right: 8px;">
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir de la cuenta') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>
    </header>
        <!--Fin Navbar -->
        <main class="py-0">
            @yield('content')
        </main>
  

    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
