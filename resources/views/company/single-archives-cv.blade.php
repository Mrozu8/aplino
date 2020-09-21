@extends('layouts.inside_archive')
@section('content')

    <div class="form-container">

        @if (session('status-success'))
            <div class="alert alert-success custom" id="alert">
                <div class="cont">
                    <p>{{ session('status-success') }}</p>
                    <hr>
                </div>
            </div>
        @elseif(session('status-error'))
            <div class="alert alert-error custom" id="alert">
                <div class="cont">
                    <p>{{ session('status-error') }}</p>
                    <hr>
                </div>
            </div>
        @endif

        <div class="space60"></div>

                <div class="ready-cv">
                    <div class="ui grid stackable cv cont">
                        <div class="ui ten wide column">
                            <div class="column">
                                <div class="cv-form">

                                    <div class="basic-data">
                                        <div class="cv-header">
                                            <h2>CV #{{ $cv->group_cv_id }}</h2>
                                        </div>
                                        <div class="ui grid stackable">
                                            <div class="twelve wide column">
                                                <div class="column">
                                                    <div class="primary-data">
                                                        <p><label>Imię: </label> {{ $cv->name }}</p>
                                                        <p><label>Nazwisko: </label> {{ $cv->surname }}</p>
                                                        <p><label>Telefon: </label> {{ $cv->phone }}</p>
                                                        <p><label>Email: </label> {{ $cv->email }}</p>
                                                        <p><label>Data urodzenia: </label> {{ $cv->birthday }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="four wide column">
                                                <div class="column">
                                                    <div class="cv-img">
                                                        <img src="{{ asset('storage/form/'. $cv->form_id. '/' . $cv->file) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="cv-hr">
                                    <div class="custom-data">

                                           @foreach($cv->content as $key => $value)

                                               @if(is_array($value))
                                                   <li class="nag">{{ ucfirst(str_replace('-', ' ', $key))  }}:</li>

                                                   @foreach($value as $val)
                                                       <div class="space10"></div>
                                                       <p class="content">{{ $val }}</p>
                                                       <div class="space10"></div>
                                                   @endforeach


                                               @else
                                                   <li class="nag">{{ ucfirst(str_replace('-', ' ', $key))  }}:</li>
                                                   <div class="space10"></div>
                                                   <p class="content">{{ $value }}</p>
                                                   <div class="space10"></div>

                                               @endif

                                           @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="six wide column">
                            <div class="column">
                                <div class="cv-tools">
                                    <div class="header">
                                        <p>Oceń CV <i class="icon star"></i></p>
                                    </div>
                                    <hr>
                                    <div class="tools">
                                        <form action="{{ route('cv-rating', [Auth::id(), $cv->form_id, $cv->id]) }}" method="post" class="ui form">
                                            @csrf
                                            {{ method_field('PATCH') }}

                                            <div class="note">
                                                <div class="field">
                                                    <label for="">Notatka:</label>
                                                    <textarea name="note" id="" class="custom-input">{{ $cv->note }}</textarea>
                                                </div>
                                            </div>

                                            <div class="rating">
                                                <div class="field">
                                                    <label for="">Ocena:</label>

                                                    <input type="range" name="rating" id="myRange" class="range" min="1" max="10" value="{{ $cv->rating }}" >
                                                    <span id="valBox" class="valBox">{{ $cv->rating }}</span>
                                                </div>
                                            </div>



                                            <div class="important">
                                                <div class="two fields">
                                                    <div class="field">
                                                        <label for="">Ważne:</label>
                                                        <p>Jesli uważasz że to CV jest w jakimś stopniu ważne możesz je oznaczyć specjalnym wyróżnieniem aby łatwiej było je znaleźć w archiwum.</p>
                                                    </div>
                                                    <div class="inline field">
                                                            <div class="ui toggle checkbox">
                                                                @if($cv->important == 1)
                                                                    <input type="checkbox" name="important" tabindex="0" class="hidden" checked>
                                                                    @else
                                                                    <input type="checkbox" name="important" tabindex="0" class="hidden">
                                                                @endif
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="button submit group">
                                                <button class="ui save button">
                                                    <i class="save icon"></i>
                                                    Zapisz
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>


@endsection

