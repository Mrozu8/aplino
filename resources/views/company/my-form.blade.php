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



       <div class="ui one column grid stackable cont">

           <div class="column">
               <div class="new-form-card">
                   <div class="header">
                       <h2>Dodaj nowy formularz</h2>
                   </div>

                   <div class="content">
                       <div class="container-card">
                           <div class="ui grid stackable flex-grid">

                               <form action="{{ route('form-create', Auth::id()) }}" method="post" class="ui form form-group">
                                   @csrf

                                   <div class="fields first-line">
                                       <div class="two fields">

                                           <div class="field title-form">
                                               <label>Nazwa formularza:</label>
                                               <input type="text" name="title" placeholder="Title" class="custom-input form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                               @if ($errors->has('title'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                   </span>
                                               @endif
                                           </div>

                                           <div class="field job-name">
                                               <label>Stanowisko:</label>
                                               <input type="text" name="profession" placeholder="Programista" class="custom-input form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}">
                                               @if ($errors->has('profession'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('profession') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>
                                       <div class="one field">

                                           <div class="field desc-form">
                                               <label>Opis stanowiska (opcjonalnie)</label>
                                               <textarea name="desc" placeholder="Opis" rows="1" class="custom-input form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}"></textarea>
                                               @if ($errors->has('desc'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('desc') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>
                                   </div>


                                   <div class="fields two-line">
                                       <div class="two fields two">

                                           <div class="field company">
                                               <label>Nazwa firmy:</label>
                                               <input type="text" name="company" placeholder="Company" value="{{ $company->company_name }}" class="custom-input form-control{{ $errors->has('company') ? ' is-invalid' : '' }}">
                                               @if ($errors->has('company'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('company') }}</strong>
                                                   </span>
                                               @endif
                                           </div>

                                           <div class="field voi">
                                               <label>Województwo rekrutacji:</label>
                                               <div class="ui selection dropdown custom-input">
                                                   <input type="hidden" name="voi" class="form-control{{ $errors->has('voi') ? ' is-invalid' : '' }}">
                                                   <div class="default text">Województwo</div>
                                                   <i class="dropdown icon"></i>
                                                   <div class="menu">
                                                       <div class="item" data-value="Dolnośląskie">Dolnośląskie</div>
                                                       <div class="item" data-value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</div>
                                                       <div class="item" data-value="Lubelskie">Lubelskie</div>
                                                       <div class="item" data-value="Lubuskie">Lubuskie</div>
                                                       <div class="item" data-value="Łódzkie">Łódzkie</div>
                                                       <div class="item" data-value="Małopolskie">Małopolskie</div>
                                                       <div class="item" data-value="Mazowieckie">Mazowieckie</div>
                                                       <div class="item" data-value="Opolskie">Opolskie</div>
                                                       <div class="item" data-value="Podkarpackie">Podkarpackie</div>
                                                       <div class="item" data-value="Podlaskie">Podlaskie</div>
                                                       <div class="item" data-value="Pomorskie">Pomorskie</div>
                                                       <div class="item" data-value="Śląskie">Śląskie</div>
                                                       <div class="item" data-value="Świętokrzyskie">Świętokrzyskie</div>
                                                       <div class="item" data-value="Warmińsko-Mazurskie">Warmińsko-mazurskie</div>
                                                       <div class="item" data-value="Wielkopolskie">Wielkopolskie</div>
                                                       <div class="item" data-value="Zachodniopomorskie">Zachodniopomorskie</div>
                                                   </div>
                                                   @if ($errors->has('voi'))
                                                       <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('voi') }}</strong>
                                                   </span>
                                                   @endif
                                               </div>
                                           </div>
                                       </div>
                                       <div class="two fields three">
                                           <div class="field street">
                                               <label>Adres:</label>
                                               <input type="text" name="street" placeholder="np. 3-go Maja 25" value="{{ $company->address }}" class="custom-input form-control{{ $errors->has('street') ? ' is-invalid' : '' }}">
                                               @if ($errors->has('street'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('street') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                           <div class="field city">
                                               <label>Miejscowość:</label>
                                               <input type="text" name="city" placeholder="Miejscowość"  class="custom-input form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                                               @if ($errors->has('city'))
                                                   <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                   </span>
                                               @endif
                                           </div>

                                       </div>
                                   </div>
                                   <div class="fields button">
                                       <div class="field text">
                                           <p>Informacje te zostaną podane w wizytówce na stronie ogłoszenia oraz w ulotce (wersji drukowanej), więcej informacji w
                                               <a href="">Poradniuk</a></p>
                                       </div>
                                       <div class="field button-submit">
                                           <div class="button new-form">
                                               <button class="circular ui icon button">
                                                   Utwórz
                                                   <i class="plus icon"></i>
                                               </button>
                                           </div>
                                       </div>

                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="column">
               <div class="active-form-card">
                   <div class="header">
                       <h2>Aktywne formularze</h2>
                   </div>

                   <div class="content">
                       <div class="container-card">
                           <div class="ui one grid stackable">
                               <div class="column">
                                   <table class="ui very basic table">
                                       <thead>
                                       <tr><th class="th-1">ID</th>
                                           <th class="th-2">Nazwa</th>
                                           <th class="th-3">Link</th>
                                           <th class="th-4">Ważny do</th>
                                           <th class="th-8">Aktywacja</th>
                                           {{--<th class="th-5">Edycja</th>--}}
                                           {{--<th class="th-6">Status</th>--}}
                                           <th class="th-7">Ustawienia</th>
                                       </tr>
                                       </thead>
                                       <tbody>

                                       @foreach($active_forms as $active_form)

                                           <tr>

                                               <td>
                                                   {{ $active_form->id }}
                                               </td>
                                               <td>
                                                   {{--<a href="{{ route('show-cv', $active_form->id) }}" class="edit-table">--}}
                                                       {{ $active_form->title }}
                                                   {{--</a>--}}
                                               </td>
                                               <td>
                                                   {{--{{ $active_form->created_at->format('Y-m-d') }}--}}
                                                   {{--<input type="text" id="copier-value" placeholder="Tekst do skopiowania" value="dddd" disabled>--}}
                                                   {{--<button id="copier-submit">Skopiuj!</button>--}}
                                                   <a href="{{ route('show-cv', [str_replace(" ", "-", $company->company_name), $active_form->id]) }}" data-id="{{ $active_form->id }}" data-copy-link disabled class="<?php if($active_form->edit == 1 || $active_form->active == 0) echo 'no-'; ?>vis">http://127.0.0.1:8000/cv/{{ str_replace(" ", "-", $company->company_name) }}/{{ $active_form->id }}</a>
                                                   {{--<div class="field button-delete" data-delete-button>--}}
                                                       {{--<div class="circular ui icon button" data-id="{{ $active_form->id }}">--}}
                                                           {{--<i class="trash alternate outline icon"></i>--}}
                                                       {{--</div>--}}
                                                   {{--</div>--}}
                                               </td>
                                               <td>
                                                   @if($active_form->active_date == null)
                                                        -
                                                       @else
                                                       {{ $active_form->active_date }}
                                                   @endif
                                               </td>
                                               <td>
                                                   @if($active_form->active_date == null)
                                                       <a href="{{ route('active-form', [Auth::id(), $active_form->id]) }}" class="active-one">
                                                           <button>
                                                               Aktywuj
                                                           </button>
                                                       </a>
                                                   @else
                                                       <a href="{{ route('active-form', [Auth::id(), $active_form->id]) }}" class="active-two">
                                                           <button>
                                                               Przedłuż
                                                           </button>
                                                       </a>
                                                   @endif
                                               </td>
                                               {{--<td>--}}
                                                   {{--<a href="{{ route('form-show', [$active_form->user->id, $active_form->id]) }}" class="edit-table">--}}
                                                       {{--<i class="edit icon"></i>--}}
                                                   {{--</a>--}}
                                               {{--</td>--}}
                                               {{--<td>--}}
                                                   {{--<form action="{{ route('form-status', [Auth::id(), $active_form->id]) }}" method="post" class="ui form">--}}
                                                       {{--@csrf--}}

                                                       {{--@if($active_form->active == 1)--}}
                                                           {{--<input type="hidden" name="status" value="0">--}}
                                                           {{--<button type="submit" class="status-active">--}}
                                                               {{--<i class="eye icon"></i>--}}
                                                           {{--</button>--}}
                                                       {{--@else--}}
                                                           {{--<input type="hidden" name="status" value="1">--}}
                                                           {{--<button type="submit" class="status-inactive">--}}
                                                               {{--<i class="fas fa-eye-slash"></i>--}}
                                                           {{--</button>--}}
                                                       {{--@endif--}}


                                                   {{--</form>--}}
                                               {{--</td>--}}
                                               <td>
                                                   {{--<form action="{{ route('form-delete', [Auth::id(), $active_form->id]) }}" method="post" class="ui form">--}}
                                                       {{--@csrf--}}
                                                       {{--{{ method_field('DELETE') }}--}}
                                                       {{--<button type="submit" class="delete-table">--}}
                                                           {{--<i class="trash alternate outline icon" onclick="onDeleteForm()"></i>--}}
                                                       {{--</button>--}}
                                                   {{--</form>--}}

                                                   <div class="ui right pointing dropdown icon button">
                                                       <i class="settings icon"></i>
                                                       <div class="menu">

                                                           <div class="item">

                                                               <form action="{{ route('form-status', [Auth::id(), $active_form->id]) }}" method="post" class="ui form">
                                                                   @csrf

                                                                   @if($active_form->active == 1)

                                                                       <input type="hidden" name="status" value="0">
                                                                       <button type="submit" class="status-active">
                                                                           <div class="ui green empty circular label"></div>
                                                                           <p>Widoczny</p>
                                                                       </button>
                                                                   @else

                                                                       <input type="hidden" name="status" value="1">
                                                                       <button type="submit" class="status-inactive">
                                                                           <div class="ui orange empty circular label"></div>
                                                                           <p>Niewidoczny</p>
                                                                       </button>
                                                                   @endif


                                                               </form>
                                                           </div>
                                                           <div class="item">

                                                               <a href="{{ route('form-show', [$active_form->user->id, $active_form->id]) }}" class="edit-table">
                                                                   @if($active_form->edit == 1)
                                                                       <div class="ui blue empty circular label"></div>
                                                                   @else
                                                                       <div class="ui grey empty circular label"></div>
                                                                   @endif
                                                                       <p>Edytuj</p>
                                                               </a>
                                                           </div>
                                                           <div class="item">

                                                               <form action="{{ route('form-delete', [Auth::id(), $active_form->id]) }}" method="post" class="ui form">
                                                                   @csrf
                                                                   {{ method_field('DELETE') }}
                                                                   <button type="submit" class="delete-table">
                                                                   {{--<i class="trash alternate outline icon" onclick="onDeleteForm()"></i>--}}
                                                                       <div class="ui red empty circular label"></div>
                                                                       <p>Usuń</p>
                                                                   </button>
                                                               </form>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </td>
                                           </tr>


                                       @endforeach


                                       {{--<script>--}}

                                            {{--$('[data-delete-button]').find('[data-id]').on('click', function (e) {--}}

                                                {{--var input = e.currentTarget.attributes['data-id'].value;--}}

                                                {{--console.log(input);--}}

                                                {{--input.select();--}}
                                                {{--document.execCommand('copy');--}}
                                            {{--});--}}

                                       {{--</script>--}}


                                       </tbody>
                                   </table>
                                   {{ $active_forms }}
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="column">
               <div class="latest-form-card">
                   <div class="header">
                       <h2>Najnowsze zgłoszenia</h2>
                   </div>
                   <a id="new_cv"></a>

                   <div class="content">
                       <div class="container-card">
                           <div class="ui one grid stackable">
                               <div class="column">
                                   <table class="ui very basic table">
                                       <thead>
                                       <tr><th class="th-1">ID</th>
                                           <th class="th-2">Nazwa</th>
                                           <th class="th-3">Data dodania</th>
                                           <th class="th-4">ID zgłoszenia</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                            @foreach($cvs as $cv)
                                                <tr>
                                                    <td>
                                                        {{ $id_cv++ }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('company-single-archives-cv', [Auth::id(), $cv->form_id, $cv->id]) }}">Nowe CV</a>
                                                    </td>
                                                    <td>
                                                        {{ $cv->created_at->format('Y-m-d') }}
                                                    </td>
                                                    <td>
                                                       {{ $cv->id }}
                                                    </td>
                                                </tr>
                                            @endforeach


                                       </tbody>
                                   </table>
                                   {{ $cvs }}
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

    </div>


    <script>

        function onDeleteForm() {
            confirm("Press a button!");
        }
    </script>

@endsection
