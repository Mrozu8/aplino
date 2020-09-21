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

    <script src="{{ asset('/js/semantic.min.js') }}" defer></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/company.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('company-single-archives', [Auth::id(), $cv->form_id]) }}">
                <i class="fas fa-arrow-circle-left"></i> Powróć do archiwum
            </a>

            <div class="navbar-segment-center">
                <a href="{{ route('company-single-archives-cv_previous', [Auth::id(), $cv->form_id, $cv->id]) }}" class="left"><i class="fas fa-angle-left"></i> poprzedni</a>
                <a href="{{ route('company-single-archives-cv_next', [Auth::id(), $cv->form_id, $cv->id]) }}" class="right">nastempny <i class="fas fa-angle-right"></i></a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>


    @yield('content')

</div>

<footer>
    <div class="inside-footer">
        <div class="company-corp">
            <p>
                © 2018 Corporating SowIT
            </p>
        </div>
    </div>
</footer>

<script src="{{ asset('/js/all.js') }}" defer></script>
<script src="{{ asset('/js/cv-ar.js') }}" defer></script>
</body>
</html>
