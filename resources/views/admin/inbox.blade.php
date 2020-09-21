@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui one column grid stackable">

            <div class="column">
                <div class="admin-inbox-card">
                    <div class="header">
                        <h2>Twoje formularze</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">
                            <div class="ui one grid stackable">
                                <div class="column">
                                    <table class="ui very basic table">
                                        <thead>
                                        <tr><th class="th-1">ID</th>
                                            <th class="th-2">User ID</th>
                                            <th class="th-3">Temat</th>
                                            <th class="th-4">Data zgłoszenia</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($inboxes as $inbox)

                                            <tr>
                                                <td>
                                                    {{ $inbox->id }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-single-user', $inbox->user_id) }}">{{ $inbox->user_id }}</a>
                                                </td>
                                                <td>
                                                   @if($inbox->active_support == 1 )
                                                        <a href="{{ route('admin-single-inbox', $inbox->id) }}" class="single-inbox">
                                                            <p class="topic">{{ $inbox->topic }} <i class="exclamation icon custom"></i></p>
                                                            <p class="small-content">{{ str_limit($inbox->thread->last()->content, 150) }}</p>
                                                        </a>
                                                       @else
                                                        <a href="{{ route('admin-single-inbox', $inbox->id) }}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui grid stackable">

                    <div class="eleven wide column">
                        <div class="column">
                            <div class="company-inbox-form">
                                <div class="header">
                                    <h2>Napisz wiadomość do wszystkich</h2>
                                </div>

                                <div class="content">
                                    <div class="container-card">
                                        <div class="ui one grid stackable">
                                            <div class="column">
                                                <form action="" method="post" class="ui form">
                                                    @csrf
                                                    <div class="inbox-fields">
                                                        <div class="field">
                                                            <label>Temat:</label>
                                                            <input type="text" name="topic" placeholder="Podaj temat" class="custom-input">
                                                        </div>
                                                        <div class="field">
                                                            <label>Treść wiadomości:</label>
                                                            <textarea name="question" placeholder="O co chcesz zapytać ?" class="custom-input"></textarea>
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


                    <div class="five wide column">
                        <div class="column">
                            <div class="company-inbox-questions">
                                <div class="header">
                                    <h2>Statystyki</h2>
                                </div>

                                <div class="content">
                                    <div class="container-card">
                                        <div class="ui one grid stackable">
                                            <div class="column">

                                            </div>
                                        </div>
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