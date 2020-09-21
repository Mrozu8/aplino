@extends('layouts.inside')
@section('content')


    @include('company.left-sidebar')


    <div class="company-custom-container">


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

        <div class="first line dashboard">
            <div class="ui three column grid stackable cont">

                <div class="column">
                    <div class="icon one card">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card one dashboard">
                        <div class="header">
                            <p>COMPANY NAME</p>
                        </div>
                        <div class="content">
                            <p>{{ $company->company_name }}</p>
                        </div>
                        <hr>
                        <div class="button">
                            <a href="{{ route('company-settings', Auth::id()) }}">Edytuj dane</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="icon two card">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card two dashboard">
                        <div class="header">
                            <p>TOOLS</p>
                        </div>
                        <div class="content">
                            <p>Dodaj nowy formularz</p>
                        </div>
                        <hr>
                        <div class="button">
                            <a href="{{ route('company-form', Auth::id()) }}">Dodaj</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="icon three card">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="card three dashboard">
                        <div class="header">
                            <p>INFORMATION</p>
                        </div>
                        <div class="content">
                            <p>Masz pytania ?</p>
                        </div>
                        <hr>
                        <div class="button">
                            <a href="{{ route('information', Auth::id()) }}">Dowiedz się więcej</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="ui grid stackable cont">
            <div class="eleven wide column custom-width">
                <div class="card dashboard form information">
                    <div class="header">
                        <div class="top">
                            <p>OBECNE KAMPANIE REKRUTACYJNE</p>
                            <hr>
                        </div>
                    </div>

                    <div class="content">
                        @if(count($forms) == 0)
                            <div class="center box">
                                <div class="alert null">
                                    <p>Na chwilę obecną nie prowadzisz żadnej kampani rekrutacyjnej.</p>
                                    <i class="fas fa-sad-cry"></i>
                                </div>
                            </div>
                            @else

                            <div class="card dashboard form table">
                                <table class="ui very basic table custom-responsive-table">
                                    <thead>
                                    <tr>
                                        <th class="th-1">Udostępnij</th>
                                        <th class="th-2">Data zakończenia</th>
                                        <th class="th-3">Widoczny</th>
                                        <th class="th-3">Ilość zgłoszeń</th>
                                        {{--<th class="th-4">Generuj ulotkę</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($forms as $form)
                                         <tr class="custom-responsive-tr">
                                             <td class="td-1 responsive-td" data-name="Udostępnij">
                                                 <a href="{{ route('show-cv', [str_replace(" ", "-", $company->company_name), $form->id]) }}" class="<?php if($form->edit == 1 || $form->active == 0) echo 'no-vis'; ?>" >http://127.0.0.1:8000/cv/{{ str_replace(" ", "-", $company->company_name) }}/{{ $form->id }}</a>
                                             </td>
                                             <td class="td-2 responsive-td" data-name="Data zakończenia">
                                                 <p>{{ $form->active_date }}</p>
                                             </td>
                                             <td class="td-3 responsive-td" data-name="Widoczny">
                                                 <form action="{{ route('form-status', [Auth::id(), $form->id]) }}" method="post" class="ui form">
                                                     @csrf

                                                     @if($form->active == 1)
                                                         <input type="hidden" name="status" value="0">
                                                         <button type="submit" class="status-active">
                                                             <i class="eye icon"></i>
                                                         </button>
                                                     @else
                                                         <input type="hidden" name="status" value="1">
                                                         <button type="submit" class="status-inactive">
                                                             <i class="fas fa-eye-slash"></i>
                                                         </button>
                                                     @endif


                                                 </form>
                                             </td>
                                             <td class="responsive-td" data-name="Ilość zgłoszeń">
                                                 <p>{{ count($form->cv) }}</p>
                                             </td>
                                             {{--<td class="td-4 responsive-td" data-name="Generuj ulotkę">--}}
                                                 {{--<form action="{{ route('pdf-qr', [Auth::id(), $form->id]) }}" method="post" class="ui form">--}}
                                                     {{--@csrf--}}
                                                     {{--<button type="submit" class="delete-table">--}}
                                                         {{--<i class="fas fa-file-download"></i>--}}
                                                     {{--</button>--}}
                                                 {{--</form>--}}
                                             {{--</td>--}}
                                         </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $forms }}
                            </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="five wide column custom-width-3">
                    <div class="card dashboard panel information">
                        <div class="header">
                            <div class="top">
                                <p>INFORMACJE DODATKOWE</p>
                                <hr>
                            </div>
                        </div>
                        <div class="content">

                        </div>
                    </div>
            </div>
        </div>

        <div class="ui grid stackable cont bottom-p">
            <div class="eleven wide column custom-width">
                <div class="card dashboard form count">
                    <div class="content">
                        <div class="header">
                            <p>Liczba aktualnych aplikacji</p>
                        </div>
                        <div class="all">
                            <p>{{ $cv_all }}</p>
                            <p class="tip">Wszystkie</p>
                        </div>
                        <div class="new">
                            <a href="{{ route('company-form', Auth::id()) }}#new_cv"><p>{{ $cv_active }}</p><p class="tip">Nowe</p></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="five wide column custom-width-2">
                <div class="card dashboard inbox">
                    <div class="header">
                        <p>INBOX</p>
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="content">
                        <p>Liczba nowych wiadomości: {{ $inbox }}</p>
                        <a href="{{ route('company-inbox', Auth::id()) }}">Podgląd</a>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection

