@extends('layouts.inside')
@section('content')


    @include('company.left-sidebar')


    <div class="company-custom-container ">

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

        <div class="ui grid stackable custom-settings cont">

            <div class="sixteen wide column">
                <div class="company-settings-card">
                    <div class="company-header">
                        <h2>Ustawienia</h2>
                    </div>

                    <div class="company-content">
                        <div class="card-container">

                            <form action="{{ route('company-update-data', $company->id) }}" method="post" class="ui form">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="ui grid stackable flex-grid">
                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Nazwa firmy:</label>
                                            <input type="text" name="company_name" value="{{ $company->company_name }}" class="custom-input">
                                        </div>
                                    </div>

                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Nip <span class="small-p">(wymagany do wystawiania faktur)</span>:</label>
                                            <input type="text" name="nip" value="{{ $company->nip }}" class="custom-input">
                                        </div>
                                    </div>

                                    {{--<div class="six wide column">--}}
                                        {{--<div class="field">--}}
                                            {{--<label for="">Adres:</label>--}}
                                            {{--<input type="text" name="address" value="{{ $company->address }}" class="custom-input">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="four wide column">--}}
                                        {{--<div class="field">--}}
                                            {{--<label for="">Telefon:</label>--}}
                                            {{--<input type="text" name="phone" value="{{ $company->phone }}" class="custom-input">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Imię i nazwisko <span class="small-p">(wymagany do wystawiania faktur)</span>:</label>
                                            <input type="text" value="{{ $company->name }}" name="name" class="custom-input" >
                                        </div>
                                    </div>

                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Adres firmy <span class="small-p">(wymagany do wystawiania faktur)</span>:</label>
                                            <input type="text" value="{{ $company->address }}" name="address" class="custom-input" >
                                        </div>
                                    </div>

                                    <div class="eight wide column">
                                        <div class="field">
                                            <div class="ui slider checkbox">
                                                <input type="checkbox" name="period_email" <?php if($company->period_email == 1) echo "checked"; ?>>
                                                <label>Wyślij email przy każdej złożonej aplikacji.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sixteen wide column">
                                        <div class="fielsd">
                                            <div class="button submit group">
                                                <button class="ui save button">
                                                    <i class="save icon"></i>
                                                    Zapisz
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="sixteen wide column">--}}
                                        {{--<div class="field">--}}
                                            {{--<label for="">Strona internetowa:</label>--}}
                                            {{--<input type="text" name="website" value="{{ $company->website }}" class="custom-input">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="sixteen wide column">--}}
                                        {{--<div class="field">--}}
                                            {{--<label for="">Opis firmy:</label>--}}
                                            {{--<textarea name="description" class="custom-input">{{ $company->description }}</textarea> --}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                </div>
                            </form>

                            <div class="header">
                                <div class="top">
                                    <p>Zmiana hasła</p>
                                    <hr>
                                </div>
                            </div>

                            <form action="{{ route('company-update-password-email', $company->id) }}" class="ui form" method="post">
                                @csrf
                                {{--{{ method_field('PATCH') }}--}}
                                <div class="ui grid stackable flex-grid">


                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Nowe hasło:</label>
                                            <input type="password" name="password" class="custom-input" required>
                                        </div>
                                    </div>
                                    <div class="eight wide column">
                                        <div class="field">
                                            <label for="">Powtórz hasło:</label>
                                            <input type="password" name="password_confirmation" class="custom-input" required>
                                        </div>
                                    </div>
                                    <div class="button submit group">
                                        <button class="ui save button">
                                            <i class="save icon"></i>
                                            Zapisz
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="six wide column custom-settings">--}}
                {{--<div class="password-card">--}}
                    {{--<div class="header">--}}
                        {{--<h2>Personalizacja</h2>--}}
                    {{--</div>--}}

                    {{--<div class="content">--}}
                        {{--<div class="card-container">--}}

                            {{--<div class="settings-change">--}}
                                {{--<label>Ustawienia wizytówki:</label>--}}
                                {{--<p class="settings-questions">( Jeżeli włączysz wizytówkę, na podstronach Twoich formularzy będzie widoczne okienko z informacjami o Twojej firmie które możesz wybrać poniżej )</p>--}}


                                {{--@if($businessCard->active == 1)--}}
                                    {{--<form class="ui form" action="{{ route('company-active-businessCard', $company->id) }}" method="post">--}}
                                        {{--@csrf--}}
                                        {{--{{ method_field('PATCH') }}--}}
                                        {{--<input type="hidden" name="active" value="0">--}}
                                        {{--<div class="button submit group">--}}
                                            {{--<button class="ui active button">--}}
                                                {{--<i class="eye icon"></i>--}}
                                                {{--Wyłącz--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}

                                {{--<form action="{{ route('company-require-info', $company->id) }}" class="ui form" method="post">--}}
                                {{--@csrf--}}
                                {{--{{ method_field('PATCH') }}--}}
                                {{--<label>Pola które będą widoczne na wizytówce:</label>--}}

                                {{--<div class="fields settings">--}}
                                    {{--<div class="two fields">--}}
                                        {{--<div class="field primary">--}}

                                         {{----}}
                                            {{--<div class="space20"></div>--}}

                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->company_name == 1)--}}
                                                        {{--<input type="checkbox" name="basic[company_name]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[company_name]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Nazwa firmy</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->address == 1)--}}
                                                        {{--<input type="checkbox" name="basic[address]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[address]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Adres</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->phone == 1)--}}
                                                        {{--<input type="checkbox" name="basic[phone]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[phone]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Numer telefonu</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->email == 1)--}}
                                                        {{--<input type="checkbox" name="basic[email]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[email]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Email</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->website == 1)--}}
                                                        {{--<input type="checkbox" name="basic[website]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[website]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Strona internetowa</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="inline fields">--}}
                                                {{--<div class="ui slider checkbox">--}}
                                                    {{--@if($businessCard->description == 1)--}}
                                                        {{--<input type="checkbox" name="basic[description]"  tabindex="0" checked class="hidden">--}}
                                                    {{--@else--}}
                                                        {{--<input type="checkbox" name="basic[description]"  tabindex="0" class="hidden">--}}
                                                    {{--@endif--}}
                                                    {{--<label>Opis</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                  {{--<div class="button submit group-settings">--}}
                                        {{--<button class="ui save button">--}}
                                            {{--<i class="save icon"></i>--}}
                                             {{--Zapisz--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                            {{--</form>--}}
                                {{--@else--}}
                                    {{--<form class="ui form" action="{{ route('company-active-businessCard', $company->id) }}" method="post">--}}
                                        {{--@csrf--}}
                                        {{--{{ method_field('PATCH') }}--}}
                                        {{--<input type="hidden" name="active" value="1">--}}
                                        {{--<div class="button submit group">--}}
                                            {{--<button class="ui inactive button">--}}
                                                {{--<i class="eye icon"></i>--}}
                                                {{--Włącz--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--@endif--}}
                            {{--</div>--}}

                            {{--<hr class="change-settings">--}}
                            {{--<form action="{{ route('company-update-password', $company->id) }}" class="ui form" method="post">--}}
                                {{--@csrf--}}
                                {{--{{ method_field('PATCH') }}--}}
                            {{--<div class="ui grid stackable flex-grid">--}}
                              {{----}}

                                {{--<div class="sixteen wide column">--}}
                                    {{--<div class="field">--}}
                                        {{--<label for="">Nowe hasło:</label>--}}
                                        {{--<input type="password" name="password" class="custom-input" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="sixteen wide column">--}}
                                    {{--<div class="field">--}}
                                        {{--<label for="">Powtórz hasło:</label>--}}
                                        {{--<input type="password" name="password_confirmation" class="custom-input" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="button submit group">--}}
                                    {{--<button class="ui save button">--}}
                                        {{--<i class="save icon"></i>--}}
                                        {{--Zapisz--}}
                                    {{--</button>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>



@endsection