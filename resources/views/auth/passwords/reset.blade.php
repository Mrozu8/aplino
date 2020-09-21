@extends('layouts.new_sign')

@section('content')

    @if (session('status'))
        <div class="alert alert-success custom" id="alert">
            <div class="cont">
                <p>{{ session('status') }}</p>
                <hr>
            </div>
        </div>
    @endif

    <section class="section section-shaped section-lg-custom">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container pt-lg-md">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card bg-secondary shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Resetuj hasło</small>
                            </div>
                            <form role="form" action="{{ route('password.request') }}" method="POST">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" value="{{ $email ?? old('email') }}" required autofocus name="email">
                                    </div>

                                    @if ($errors->has('email'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Nowe hasło" type="password" name="password">
                                    </div>

                                    @if ($errors->has('password'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Powtórz hasło" type="password" name="password_confirmation">
                                    </div>

                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Resetuj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('password.request') }}" class="text-light">
                                <b>Zapomniałeś hasła ?</b>
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}" class="text-light">
                                <b>Stwórz nowe konto</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
