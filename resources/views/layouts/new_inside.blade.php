<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Design System - Free Design System for Bootstrap 4</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.1') }}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{ asset('assets/css/docs.min.css') }}" rel="stylesheet">

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
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">

</head>

<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/brand/white.png') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/img/brand/blue.png') }}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    @guest
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="{{ route('login') }}"  class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon">
                          <i class="fa fa-user mr-2"></i>
                        </span>
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
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

                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{ route('logout') }}"  class="btn btn-neutral btn-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <span class="btn-inner--icon">
                                      <i class="fa fa-user mr-2"></i>
                                    </span>
                                <span class="nav-link-inner--text">Wyloguj</span>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @endguest

                </ul>
            </div>
        </div>
    </nav>
</header>
<main>


    @yield('content')



</main>

{{--<footer class="footer has-cards">--}}

{{--</footer>--}}
<!-- Core -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/headroom/headroom.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.0.1') }}"></script>
</body>

</html>