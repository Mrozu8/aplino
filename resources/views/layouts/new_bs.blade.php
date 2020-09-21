<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
        <title>{{ config('app.name', 'Laravel') }}</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.1') }}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{ asset('assets/css/docs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/new_mini.css') }}" rel="stylesheet">




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
                            <a href="">
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

<footer class="footer has-cards">

    <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-6">
                <h3 class="text-primary font-weight-light mb-2">Dołącz do naszej społeczności.</h3>

                <div class="newsletter">
                    <div class="container">
                        <div class="row">
                            <div class="col text-lg-center text-left">
                                <div class="newsletter_content">


                                    <!-- Newsletter Form -->
                                    <div class="newsletter_form_container">
                                        <form action="{{ route('newsletter') }}" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="email" class="newsletter_email" placeholder="Your e-mail address here" required="required"  name="email">
                                                <button id="newsletter_form_submit" type="submit" class="button newsletter_submit_button trans_200" value="Submit">
                                                    subscribe
                                                </button>
                                            </div>
                                        </form>
                                        @if (session('status-success'))
                                            <div class="alert alert-success custom" id="alert">
                                                <div class="cont">
                                                    <p>{{ session('status-success') }}</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        @elseif( $errors->has('email') )
                                            <div class="alert alert-error custom" id="alert">
                                                <div class="cont">
                                                    <p>{{ $errors->first('email') }}</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>--}}
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
                    <i class="fa fa-dribbble"></i>
                </a>
                <a target="_blank" href="https://github.com/creativetimofficial" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
                    <i class="fa fa-github"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    &copy; 2018
                    <a href="http://sow-it.pl/" target="_blank">SowIT</a>.
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a href="{{ route('privacy') }}" class="nav-link">Polityka prywatności</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cookie') }}" class="nav-link">Polityka cookies</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rule') }}" class="nav-link">Regulamin</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Core -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/headroom/headroom.min.js') }}"></script>


<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.0.1') }}"></script>


</body>

</html>