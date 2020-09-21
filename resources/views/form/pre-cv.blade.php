@extends('layouts.form')
@section('content')



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


        <div class="modal-business-card">
            <button class="business-card-modal">
                <i class="address card icon"></i>
                <div class="ui basic tiny modal">
                    <div class="actions">
                        <div class="ui cancel button">
                            <i class="remove icon"></i>

                        </div>
                    </div>
                    <div class="ui icon header">
                        <i class="search icon"></i>
                        {{ $form->company }}
                    </div>

                    <div class="content">
                        {{--@if( $business_card->email == 1)--}}
                        {{--<p><i class="envelope icon"></i>: {{ $form->user->email }}</p>--}}
                        {{--@endif--}}
                        {{--@if( $business_card->phone == 1)--}}
                        {{--<p><i class="phone icon"></i>: {{ $form->user->phone }}</p>--}}
                        {{--@endif--}}
                        {{--@if( $business_card->address == 1)--}}
                        <p><i class="address book icon"></i>: {{ $form->profession }}</p>
                        <p><i class="location arrow icon"></i>: {{ $form->street }}, {{ $form->city }}, {{ $form->voi }}</p>
                        {{--@endif--}}
                        {{--@if( $business_card->website == 1)--}}
                        {{--<p><i class="laptop icon"></i>: <a href="{{ $form->user->website }}" target="blink">Link do strony</a></p>--}}
                        {{--@endif--}}
                        {{--@if( $business_card->description == 1)--}}
                        <p class="description">{{ $form->description }}</p>
                        {{--@endif--}}
                    </div>
                </div>
            </button>
        </div>



    <div class="form-container">


        <div class="space60"></div>

        <div class="ui one column grid stackable">
            <div class="column">
                <div class="single-cv">
                    <div class="ui grid stackable cv">
                        <div class="ui ten wide column">
                            <div class="column">
                                <div class="cv-form">

                                    <div class="cv-header">
                                        <p>Curriculum vitae</p>
                                    </div>

                                    <form action="" class="ui form" method="post" enctype="multipart/form-data">
                                        {{--@csrf--}}
                                        {{--{{ method_field('PATCH') }}--}}

                                        <div class="basic-inputs">
                                            <div class="ui grid stackable">
                                                <div class="twelve wide column">
                                                    <div class="fields">
                                                        <div class="four fields">

                                                            @if($form->name == 1)
                                                                <div class="field name">
                                                                    <label>Imię:</label>
                                                                    <input type="text" name="basic[name]" placeholder="Imię" class="custom-input" value="{{ old('basic')['name'] }}">
                                                                    @if ($errors->has('basic.name'))
                                                                        <div class="alert-validate">
                                                                            <strong>{{ $errors->first('basic.name') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            @endif

                                                            @if($form->surname == 1)
                                                                <div class="field surname">
                                                                    <label>Nazwisko:</label>
                                                                    <input type="text" name="basic[surname]" placeholder="Nazwisko" class="custom-input" value="{{ old('basic')['surname'] }}">
                                                                    @if ($errors->has('basic.surname'))
                                                                        <div class="alert-validate">
                                                                            <strong>{{ $errors->first('basic.surname') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            @if($form->email == 1)
                                                                <div class="field email">
                                                                    <label>Email:</label>
                                                                    <input type="text" name="basic[email]" placeholder="Email" class="custom-input" value="{{ old('basic')['email'] }}">
                                                                    @if ($errors->has('basic.email'))
                                                                        <div class="alert-validate">
                                                                            <strong>{{ $errors->first('basic.email') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            @if($form->phone == 1)
                                                                <div class="field phone">
                                                                    <label>Telefon:</label>
                                                                    <input type="text" name="basic[phone]" placeholder="Phone" class="custom-input" value="{{ old('basic')['phone'] }}">
                                                                    @if ($errors->has('basic.phone'))
                                                                        <div class="alert-validate">
                                                                            <strong>{{ $errors->first('basic.phone') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                                @if($form->birthday == 1)
                                                                    <div class="field phone">
                                                                        <label>Telefon:</label>
                                                                        <input type="date" name="basic[birthday]" placeholder="Birthday" class="custom-input" value="{{ old('basic')['birthday'] }}">
                                                                        @if ($errors->has('basic.birthday'))
                                                                            <div class="alert-validate">
                                                                                <strong>{{ $errors->first('basic.birthday') }}</strong>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="four wide column">
                                                    @if($form->file == 1)
                                                        <div class="field file">
                                                            <div class="ui middle aligned center aligned grid container">
                                                                <input type="file"  name="file" class="inputfile" id="embedpollfileinput">

                                                                <label for="embedpollfileinput" class="ui huge green right floated button">
                                                                    <i class="ui upload icon"></i>
                                                                    Upload image
                                                                </label>
                                                            </div>
                                                        </div>

                                                    @endif

                                                </div>
                                            </div>

                                            <hr class="form-hr">

                                            {{--///////////////////////////////// Custom inputs ///////////////////////////////////////--}}




                                            <div class="custom input cv">
                                                @foreach($customs as $custom)


                                                    @if($custom->type == 1)
                                                        <div class="two fields">
                                                            <div class="field text">
                                                                <li>{{ $custom->name }}:</li>
                                                                <input type="text" name="{{ $custom->slug }}"  class="custom-input" value="{{ old($custom->slug) }}">

                                                            </div>
                                                        </div>


                                                    @elseif($custom->type == 2)

                                                        <div class="two fields">
                                                            <div class="field text">
                                                                <li>{{ $custom->name }}:</li>
                                                                <textarea type="text" name="{{ $custom->slug }}" rows="5" class="custom-input">{{ old($custom->slug) }}</textarea>
                                                            </div>
                                                        </div>


                                                    @elseif($custom->type == 3)


                                                        <div class="field">
                                                            <div class="two fields">
                                                                <div class="field text">
                                                                    <li>{{ $custom->name }}</li>
                                                                </div>
                                                            </div>


                                                            @foreach($custom->radio as $value)

                                                                <div class="two fields">
                                                                    <div class="field answer">
                                                                        <div class="ui radio checkbox cv">
                                                                            <input type="radio" name="{{$custom->slug}}" value="{{ $value->content }}" class="custom-input">
                                                                            <label> {{ $value->content }} </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        </div>

                                                    @elseif($custom->type == 4)
                                                        <div class="field">

                                                            <div class="two fields">
                                                                <div class="field text">
                                                                    <li>{{ $custom->name }}</li>
                                                                </div>
                                                            </div>
                                                            @foreach($custom->checkbox as $value)

                                                                <div class="two fields">
                                                                    <div class="field answer">
                                                                        <div class="ui checkbox cv">
                                                                            <input type="checkbox" name="{{ $custom->slug}}[]" tabindex="0" class="hidden" value="{{ $value->content }}">
                                                                            <label>{{ $value->content }}</label>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            @endforeach
                                                        </div>

                                                    @endif

                                                @endforeach



                                            </div>
                                        </div>

                                    </form>
                                    <div class="button submit group pre-cv">

                                        <a href="{{ route('form-show', [Auth::id(), $form->id]) }}">
                                            <button class="ui save button pre-cv" >
                                                <i class="arrow alternate circle left outline icon"></i>
                                                Powrót
                                            </button>
                                        </a>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection