@extends('layouts.form')
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

    <div class="ui grid stackable custom-form-all">
        <div class="ui ten wide column form">
            <div class="column">
                <div class="mine-form">

                    <div class="cv-header">
                        <p>CV</p>
                    </div>

                    <form action="{{ route('update-form', [Auth::id(), $form->id]) }}" class="ui form" method="post" id="mine-form">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="basic-inputs">
                            <div class="ui grid stackable">
                                <div class="twelve wide column">
                                    <div class="fields">
                                        <div class="four fields">

                                            @if($form->name == 1)
                                                <div class="field name">
                                                    <label>Imię:</label>
                                                    <input type="text" name="name" placeholder="Imię" class="custom-input" disabled>
                                                    <input type="hidden" name="basic[name]" value="1">
                                                </div>
                                            @endif

                                            @if($form->surname == 1)
                                                <div class="field surname">
                                                    <label>Nazwisko:</label>
                                                    <input type="text" name="surname" placeholder="Nazwisko" class="custom-input" disabled>
                                                    <input type="hidden" name="basic[surname]" value="1">
                                                </div>
                                            @endif



                                            @if($form->email == 1)
                                                <div class="field email">
                                                    <label>Email:</label>
                                                    <input type="text" name="email" placeholder="Email" class="custom-input" disabled>
                                                    <input type="hidden" name="basic[email]" value="1">
                                                </div>
                                            @endif

                                            @if($form->phone == 1)
                                                <div class="field phone">
                                                    <label>Telefon:</label>
                                                    <input type="text" name="phone" placeholder="Phone" class="custom-input" disabled>
                                                    <input type="hidden" name="basic[phone]" value="1">
                                                </div>
                                            @endif

                                            @if($form->birthday == 1)
                                                <div class="field phone">
                                                    <label>Data urodzenia:</label>
                                                    <input type="date" name="birthday" placeholder="Birthday" class="custom-input" disabled>
                                                    <input type="hidden" name="basic[birthday]" value="1">
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                                <div class="four wide column">
                                    @if($form->file == 1)
                                        <div class="field file">
                                            <div class="ui middle aligned center aligned grid container">
                                                    <input type="file"  name="basic[file]" class="inputfile" id="embedpollfileinput" disabled>

                                                    <label for="embedpollfileinput" class="ui huge green right floated button">
                                                        <i class="ui upload icon"></i>
                                                        Dodaj zdjęcie
                                                    </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr class="form-hr">

                        {{--///////////////////////////////// Custom inputs ///////////////////////////////////////--}}




                        <div class="custom input cv" >
                            @foreach($customs as $custom)


                                @if($custom->type == 1)
                                    <div class="two fields">
                                        <div class="field text">
                                            <label>{{ $custom->name }}:</label>
                                            <input type="text" name="slug[{{ $custom->id }}]" value="{{ $custom->name }}" class="custom-input" >

                                        </div>
                                        <div class="field button-delete" data-delete-button>
                                             <div class="circular ui icon button" data-id="{{$custom->id}}">
                                                <i class="trash alternate outline icon"></i>
                                            </div>
                                        </div>
                                    </div>


                                @elseif($custom->type == 2)

                                  <div class="two fields">
                                      <div class="field text">
                                          <label>{{ $custom->name }}:</label>
                                          <textarea type="text" name="slug[{{ $custom->id }}]" rows="5" class="custom-input">{{ $custom->name }}</textarea>
                                      </div>
                                      <div class="field button-delete" data-delete-button>
                                          <div class="circular ui icon button" data-id="{{$custom->id}}">
                                             <i class="trash alternate outline icon"></i>
                                          </div>
                                      </div>
                                  </div>


                                @elseif($custom->type == 3)
                                    <div class="field">
                                          <div class="two fields">
                                              <div class="field text">
                                                  <label>{{ $custom->name }}:</label>
                                                  <input type="text" name="slug[{{ $custom->id }}]" value="{{ $custom->name }}" class="custom-input">
                                              </div>

                                              <div class="field button-delete" data-delete-button>
                                                  <div class="circular ui icon button" data-id="{{$custom->id}}">
                                                       <i class="trash alternate outline icon"></i>
                                                  </div>
                                              </div>
                                          </div>


                                        @foreach($custom->radio as $value)

                                           <div class="two fields">
                                               <div class="field answer">
                                                   <div class="ui radio checkbox">
                                                       <input type="radio" name="fruit" class="hidden">
                                                       <label><input type="text" name="radio[{{$value->id}}]" value="{{ $value->content }}" class="custom-input"></label>
                                                   </div>
                                               </div>
                                               <div class="field button-answer-delete" data-delete-radio-button>
                                                       <div class="circular ui icon mini button" data-id="{{$value->id}}">
                                                           <i class="trash alternate outline icon"></i>
                                                       </div>
                                               </div>
                                           </div>

                                        @endforeach
                                    </div>

                                @elseif($custom->type == 4)

                                    <div class="field">

                                        <div class="two fields">
                                            <div class="field text">
                                                <label>{{ $custom->name }}:</label>
                                                <input type="text" name="slug[{{ $custom->id }}]" value="{{ $custom->name }}" class="custom-input">
                                            </div>
                                            <div class="field button-delete" data-delete-button>
                                                <div class="circular ui icon button" data-id="{{$custom->id}}">
                                                   <i class="trash alternate outline icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($custom->checkbox as $value)

                                         <div class="two fields">
                                             <div class="field answer">
                                                 <div class="ui checkbox">
                                                     <input type="checkbox" name="fruit" class="hidden">
                                                     <label><input type="text" name="check[{{$value->id}}]" value="{{ $value->content }}" class="custom-input"></label>
                                                 </div>
                                             </div>
                                             <div class="field button-answer-delete" data-delete-checkbox-button>
                                                 <div class="circular ui icon mini button" data-id="{{$value->id}}">
                                                    <i class="trash alternate outline icon"></i>
                                                 </div>
                                             </div>
                                         </div>

                                        @endforeach
                                    </div>

                                @endif

                            @endforeach


                        </div>

                    </form>

                          <div class="button submit group">

                               <a href="{{ route('show-pre-cv', [str_replace(" ", "-", $form->company), $form->id]) }}">
                                  <button class="ui services button">
                                    <i class="eye icon"></i>
                                    Podgląd
                                </button>
                               </a>

                              <button class="ui save button" id="save-form">
                                  <i class="save icon"></i>
                                  Zapisz
                              </button>

                              <a href="{{ route('edit-end', [Auth::id(), $form->id]) }}">
                                  <button class="ui edit-end button">
                                      <i class="check icon"></i>
                                      Zatwierdź
                                  </button>
                              </a>
                          </div>

                        <div class="button-edit-end">

                        </div>

                </div>
            </div>

        </div>



        {{--========================================= narzędzia =================================================--}}

        <div class="ui six wide column tools">
            <div class="column">
                <div class="form tools">
                    <div class="header">
                        <p>Narzędzia <i class="icon wrench"></i></p>
                    </div>
                    <hr>
                    <div class="input-tools">

                        <div class="primary-tools">
                            <div class="nag">
                                <label>Główne pola </label>
                                <p>Dodaj przesuwając suwak w prawo podstawowe informacje jakie chcesz uzyskać.</p>
                            </div>
                            <div class="field button-submit" id="primary-tools-toggle">
                                <div class="button new-form">
                                    <button class="circular ui icon button">
                                        <i class="angle down icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                            <form action="{{ route('basic-input', [Auth::id(), $form->id]) }}" class="ui form primary" method="post" id="primary-tools">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="fields">
                                    <div class="two fields">
                                        <div class="field primary">

                                            {{--<label>Podstawowe pola:</label>--}}
                                            <div class="space20"></div>

                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->name == 1)
                                                        <input type="checkbox" name="basic[name]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[name]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Imię</label>
                                                </div>
                                            </div>
                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->surname == 1)
                                                        <input type="checkbox" name="basic[surname]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[surname]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Nazwisko</label>
                                                </div>
                                            </div>
                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->file == 1)
                                                        <input type="checkbox" name="basic[file]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[file]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Zdjęcie</label>
                                                </div>
                                            </div>
                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->email == 1)
                                                        <input type="checkbox" name="basic[email]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[email]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Email</label>
                                                </div>
                                            </div>
                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->phone == 1)
                                                        <input type="checkbox" name="basic[phone]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[phone]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Telefon</label>
                                                </div>
                                            </div>
                                            <div class="inline fields">
                                                <div class="ui slider checkbox">
                                                    @if($form->birthday == 1)
                                                        <input type="checkbox" name="basic[birthday]"  tabindex="0" checked class="hidden">
                                                    @else
                                                        <input type="checkbox" name="basic[birthday]"  tabindex="0" class="hidden">
                                                    @endif
                                                    <label>Data urodzenia</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="field button-submit">
                                            <div class="button new-form">
                                                <button class="circular ui icon button">
                                                    <i class="plus icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        <hr class="form-tools hr">

                        <div class="primary-tools">
                            <div class="nag">
                                <label>Pole tekstowe</label>
                                <p>Utwórz pole z zapytaniem, na które odpowiedź zostanie udzielona w kilku zdaniach.</p>
                            </div>
                            <div class="field button-submit" id="text-tools-toggle">
                                <div class="button new-form">
                                    <button class="circular ui icon button">
                                        <i class="angle down icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('create-input', [Auth::id(), $form->id]) }}" class="ui form text" method="post" id="text-tools">
                            @csrf
                            <div class="fields">
                                <div class="two fields">
                                    <div class="field text">

                                        <input type="text" name="name"  placeholder="Zadaj pytanie" class="custom-input">
                                        <input type="hidden" name="type" value="1">
                                    </div>
                                    <div class="field button-submit">
                                        <div class="button new-form">
                                            <button class="circular ui icon button">
                                                <i class="plus icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <hr class="form-tools hr">


                        <div class="primary-tools">
                            <div class="nag">
                                <label>Duże pole tekstowe</label>
                                <p>Utwórz pole z zapytaniem na które odpowiedź może być bardziej rozbudowana.</p>
                            </div>
                            <div class="field button-submit" id="textarea-tools-toggle">
                                <div class="button new-form">
                                    <button class="circular ui icon button">
                                        <i class="angle down icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('create-input', [Auth::id(), $form->id]) }}" class="ui form textarea" id="textarea-tools" method="post">
                            @csrf
                            <div class="fields">
                                <div class="two fields">
                                    <div class="field textarea">
                                        <textarea name="name" placeholder="Zadaj pytanie" rows="5" class="custom-input"></textarea>
                                        <input type="hidden" name="type" value="2">
                                    </div>
                                    <div class="field button-submit">
                                        <div class="button new-form">
                                            <button class="circular ui icon button">
                                                <i class="plus icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <hr class="form-tools hr">


                        <div class="primary-tools">
                            <div class="nag">
                                <label>Pole z jedną odpowiedzią</label>
                                <p>Dodaj zapytanie z polem jednorazowego wyboru. Odpowiedzi może być wiele, lecz tylko jedna zostanie zaznaczona.</p>
                            </div>
                            <div class="field button-submit" id="radio-tools-toggle">
                                <div class="button new-form">
                                    <button class="circular ui icon button">
                                        <i class="angle down icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                       <div class="radio-form-tools">
                           <form action="{{ route('create-input', [Auth::id(), $form->id]) }}" class="ui form radio" method="post" id="radio-tools">
                               @csrf
                               <div class="fields">
                                   <div class="two fields">
                                       <div class="grouped fields">
                                           <div class="field radio-nag">
                                               <input type="text" name="name" placeholder="Zadaj pytanie" class="custom-input">
                                               <input type="hidden" name="type" value="3">
                                           </div>

                                           <div class="space10"></div>

                                           <div id="radio-hook">  {{--dodawanie pól - do poprawy--}}
                                               <div class="field radio">
                                                   <div class="ui radio checkbox">
                                                       <input type="radio" tabindex="0" class="hidden">
                                                       <label><input type="text" name="radio[]" class="custom-input"></label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="field button-submit">
                                           <div class="button new-form">
                                               <button class="circular ui icon button">
                                                   <i class="plus icon"></i>
                                               </button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>

                           <div class="radio add-del button">
                               <button class="circular ui icon tiny button btn-radio-add">
                                   <i class="plus icon"></i>
                               </button>
                               <button class="circular ui icon tiny button btn-radio-delete">
                                   <i class="minus icon"></i>
                               </button>
                           </div>
                       </div>

                        <hr class="form-tools hr">



                        <div class="primary-tools">
                            <div class="nag">
                                <label>Pole z wieloma odpowiedziami</label>
                                <p>Dodaj zapytanie z polem wielokrotnego wyboru. Odpowiedzi może być wiele i wiele zaznaczonych.</p>
                            </div>
                            <div class="field button-submit" id="checkbox-tools-toggle">
                                <div class="button new-form">
                                    <button class="circular ui icon button">
                                        <i class="angle down icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox-form-tools">
                            <form class="ui form checkbox" action="{{ route('create-input', [Auth::id(), $form->id]) }}" method="post" id="checkbox-tools">
                                @csrf

                                <div class="fields">
                                    <div class="two fields">
                                        <div class="grouped fields">
                                            <div class="field checkbox-nag">
                                                <input type="text" name="name"  placeholder="Zadaj pytanie" class="custom-input">
                                                <input type="hidden" name="type" value="4">
                                            </div>

                                            <div class="space10"></div>

                                            <div id="checkbox-hook">
                                                <div class="field checkbox">
                                                    <div class="ui checkbox">
                                                        <input type="checkbox" tabindex="0" class="hidden">
                                                        <label><input type="text" name="checkbox[]" class="custom-input"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field button-submit">
                                            <div class="button new-form">
                                                <button class="circular ui icon button">
                                                    <i class="plus icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <div class="checkbox add-del button">
                                <button class="circular ui icon tiny button btn-checkbox-add">
                                    <i class="plus icon"></i>
                                </button>
                                <button class="circular ui icon tiny button btn-checkbox-delete">
                                    <i class="minus icon"></i>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<form action="{{ route('custom-delete', [Auth::id(), $form->id]) }}" method="post" id="delete-custom">
    @csrf
    {{ method_field('DELETE') }}
</form>

@endsection