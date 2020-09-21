@extends('layouts.new_sign')

@section('content')
    <section class="section section-shaped section-lg-register">
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
                        <div class="card-header bg-white">
                            <div class="text-muted text-center mb-3">
                                <b>Rejestracja</b>
                            </div>
                            {{--<div class="text-center">--}}
                                {{--<a href="#" class="btn btn-neutral btn-icon mr-4">--}}
                                    {{--<span class="btn-inner--icon">--}}
                                      {{--<img src="{{ asset('assets/img/icons/common/github.svg') }}">--}}
                                    {{--</span>--}}
                                                    {{--<span class="btn-inner--text">Github</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="btn btn-neutral btn-icon">--}}
                                    {{--<span class="btn-inner--icon">--}}
                                      {{--<img src="{{ asset('assets/img/icons/common/google.svg') }}">--}}
                                    {{--</span>--}}
                                    {{--<span class="btn-inner--text">Google</span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        </div>
                        <div class="card-body px-lg-5 py-lg-3">
                            <div class="text-center text-muted mb-4">
                                {{--<small>Or sign up with credentials</small>--}}
                            </div>
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Nazwa firmy" type="text" name="company_name">
                                    </div>
                                    @if ($errors->has('company_name'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password" name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password" name="password_confirmation">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert-validate">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox" name="rule" required>
                                            <label class="custom-control-label" for="customCheckRegister">
                                              <span>Akceptuję
                                                  <a href="{{ route('rule') }}">Regulamin</a> i
                                                <a href="{{ route('privacy') }}">Politykę prywatności</a>
                                              </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Załóż konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
