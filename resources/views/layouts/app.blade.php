<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="{{ asset('/js/semantic.min.js') }}" defer></script>
    <script src="{{ asset('/js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Home
                </a>
                <a class="navbar-brand" href="{{ route('offer') }}">
                    Dla firm
                </a>
                <a class="navbar-brand" href="{{ route('contact') }}">
                    Kontakt
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                            @if(is_admin())
                                <a  class="nav-link" href="{{ route('admin-home') }}">
                                    Panel admina
                                </a>
                            @else
                                <a  class="nav-link" href="{{ route('company-show', Auth::id()) }}">
                                    {{ Auth::user()->company_name }}
                                </a>
                            @endif


                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


            @yield('content')

    </div>

<footer>
    <div class="footer-mine-page">
        <div class="ui container">
            <div class="ui three column grid stackable">

                <div class="column">
                    <div class="about-company">
                        <h2>Company</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor ducimus earum esse facilis labore praesentium repellendus sed tempora tenetur totam!</p>
                    </div>
                </div>

                <div class="column">
                    <div class="page-links">
                        <h2>Useful links</h2>
                        <p><a href="{{ route('home') }}">Home</a></p>
                        <p><a href="{{ route('offer') }}">Dla firm</a></p>
                        <p><a href="{{ route('contact') }}">Contact</a></p>
                        <p><a href="">Regulamin</a></p>
                    </div>
                </div>

                <div class="column">
                    <div class="contact-info">
                        <h2>Contact</h2>
                        <p>
                            <i class="location arrow icon"></i> Aleja Powstańców Warszawy 10, Rzeszów
                        </p>
                        <p>
                            <i class="phone icon"></i> + 48 723 123 324
                        </p>
                        <p>
                            <i class="envelope icon"></i> mrozek.dominik8@gmail.com
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="company-corp">
        <p>
             © 2018 Corporating SowIT
        </p>
    </div>
</footer>

</body>
</html>
