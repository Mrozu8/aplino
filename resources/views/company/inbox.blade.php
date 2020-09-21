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
                <div class="company-inbox-card">
                    <div class="header">
                        <h2>Zgłoszenia</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">

                            <div class="ui one grid stackable">
                                <div class="column">

                                    <form action="{{ route('company-inbox', Auth::id()) }}" method="get" class="ui form search-inbox">
                                        @csrf
                                        <div class="field inline-search">
                                            <div class="field search">
                                                <div class="ui icon input">
                                                    <input type="text" name="search" placeholder="Search...">

                                                    <button type="submit">
                                                        <i class="search link icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="two fields input-search">
                                               <div class="one-group">
                                                   <div class="field get-new">
                                                       <button class="ui inverted blue button" name="new" value="2">Najnowsze</button>
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
                                            <th class="th-2">Temat</th>
                                            <th class="th-3">Data dodania</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($inboxes as $inbox)

                                            <tr>
                                                <td>
                                                    {{ $inbox->id }}
                                                </td>
                                                <td >
                                                    @if($inbox->active_user == 1 )
                                                        <a href="{{ route('company-single-inbox', [Auth::id(), $inbox->id]) }}" class="single-inbox">
                                                            <p class="topic">{{ $inbox->topic }} <i class="exclamation icon custom"></i></p>
                                                            <p class="small-content">{{ str_limit($inbox->thread->last()->content, 150) }}</p>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('company-single-inbox', [Auth::id(), $inbox->id]) }}">
                                                            <p class="topic">{{ $inbox->topic }}</p>
                                                            <p class="small-content">{{ str_limit($inbox->thread->last()->content, 150) }}</p>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $inbox->created_at->format('Y-m-d') }}
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $inboxes }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui grid stackable inbox-custom">

                    {{--================================== pytania =========================--}}
                    <div class="eight wide column">
                        <div class="column">
                            <div class="company-inbox-questions">
                                <div class="header">
                                    <h2>Częste pytania</h2>
                                </div>

                                <div class="content">
                                    <div class="container-card">
                                        <div class="ui one grid stackable">
                                            <div class="column">
                                                <div class="ui accordion">
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                       Lorem ipsum dolor sit.
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequuntur cum delectus deserunt dolorem fuga labore quas quo recusandae tempore!</p>
                                                    </div>
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                        Lorem ipsum dolor sit amet, consectetur.
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dolorem id iste magni nesciunt nulla, odit porro quae qui quis, repellendus sequi sunt tempore. Aspernatur eum fugit nemo odit optio.</p>
                                                    </div>
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                        Lorem ipsum.
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam atque culpa dolor earum non praesentium ratione voluptates. Eligendi laudantium nam nobis, similique temporibus voluptatibus?</p>
                                                    </div>
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                        Lorem ipsum dolor sit.
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam corporis doloremque ducimus fuga ipsam officia provident ratione repellendus!</p>
                                                        <p class="transition hidden">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam atque culpa dolor earum non praesentium ratione voluptates. Eligendi laudantium nam nobis, similique temporibus voluptatibus?</p>
                                                    </div>
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                        Lorem ipsum dolor sit.
                                                    </div>
                                                    <div class="content">
                                                        <p class="transition hidden"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam atque culpa dolor earum non praesentium ratione voluptates. Eligendi laudantium nam nobis, similique temporibus voluptatibus?</p>
                                                    </div>
                                                    <div class="title">
                                                        <i class="dropdown icon"></i>
                                                        Lorem ipsum dolor sit.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--==================================== formularz ===============================--}}
                    <div class="eight wide column">
                        <div class="column">
                            <div class="company-inbox-form">
                                <div class="header">
                                    <h2>Napisz do nas</h2>
                                </div>

                                <div class="content">
                                    <div class="container-card">
                                        <div class="ui one grid stackable">
                                            <div class="column">
                                                <form action="{{ route('question-company', Auth::id()) }}" method="post" class="ui form">
                                                    @csrf
                                                    <div class="inbox-fields">
                                                         <div class="field">
                                                            <label>Temat:</label>
                                                               <input type="text" name="topic" value="{{ old('topic') }}" placeholder="Podaj temat" class="custom-input" >
                                                             @if ($errors->has('topic'))
                                                                 <div class="alert-validate">
                                                                     <strong>{{ $errors->first('topic') }}</strong>
                                                                 </div>
                                                             @endif
                                                            </div>
                                                            <div class="field">
                                                                 <label>Treść wiadomości:</label>
                                                             <textarea name="question" placeholder="O co chcesz zapytać ?" class="custom-input">{{ old('question') }}</textarea>
                                                            @if ($errors->has('question'))
                                                                <div class="alert-validate">
                                                                    <strong>{{ $errors->first('question') }}</strong>
                                                                </div>
                                                            @endif
                                                            </div>
                                                            <div class="button submit">
                                                                <button class="ui save button">
                                                                    <i class="send icon"></i>
                                                                    Wyślij
                                                                </button>
                                                            </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--================================== Zgłoszenia ===============================--}}


        </div>
    </div>



@endsection
