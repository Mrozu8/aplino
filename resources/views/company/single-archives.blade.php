@extends('layouts.inside')
@section('content')


    @include('company.left-sidebar')


    <div class="company-custom-container">
        <div class="ui one column grid stackable cont">

            <div class="column">
                <div class="archives-single-form-card">
                    <div class="header">
                        <h2>Twoje formularze</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">
                            <div class="ui one grid stackable">
                                <div class="column">

                                    <form action="{{ route('company-single-archives', [Auth::id(), $form_id]) }}" method="get" class="ui form search-inbox">
                                        @csrf
                                        <div class="field inline-search">
                                            <div class="field search">
                                                <div class="ui icon input">
                                                    <input type="text" name="search" placeholder="Email . . .">

                                                    <button type="submit">
                                                        <i class="search link icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="four fields input-search">


                                                <div class="two-group">
                                                    <div class="field get-important">
                                                        <button class="ui inverted red button" name="important" value="1">Ważne</button>
                                                    </div>
                                                    <div class="field get-best">
                                                        <button class="ui inverted green button" name="best" value="1">Najlepsze</button>
                                                    </div>

                                                </div>
                                                <div class="one-group">
                                                    <div class="field get-new">
                                                        <button class="ui inverted blue button" name="new" value="1">Najnowsze</button>
                                                    </div>
                                                    <div class="field get-old">
                                                        <button class="ui inverted blue button" name="old" value="1">Najstarsze</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <table class="ui very basic table">
                                        <thead>
                                        <tr><th class="th-1">ID</th>
                                            <th class="th-2">Eamil</th>
                                            <th class="th-3">Ważne</th>
                                            <th class="th-4">Data dodania</th>
                                            <th class="th-5">Ocena</th>
                                            <th class="th-6">Eksportuj do XML</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($cvs as $cv)
                                            <tr>
                                                <td>
                                                    {{ $archive_id++ }}
                                                </td>
                                                <td>
                                                  @if(!$cv->email || !$cv->name || !$cv->surname)
                                                      <a href="{{ route('company-single-archives-cv', [Auth::id(), $cv->form_id, $cv->id]) }}">Aplikacja nr {{ $cv->group_cv_id }} </a>
                                                  @else
                                                    <a href="{{ route('company-single-archives-cv', [Auth::id(), $cv->form_id, $cv->id]) }}">{{ $cv->email }} /  {{ $cv->name }}{{ $cv->surname }}</a>
                                                  @endif
                                                </td>
                                                <td>
                                                    @if($cv->important == 1)
                                                        <div class="important">
                                                            <i class="exclamation circle icon"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $cv->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    {{ $cv->rating }}/10
                                                </td>
                                                <td>
                                                    <form action="{{ route('single-cv-xml',[Auth::id(), $form_id, $cv->id]) }}">
                                                        @csrf
                                                        <button class="ui icon button add-xml">
                                                            <i class="download icon"></i>
                                                        </button>
                                                    </form>
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



@endsection