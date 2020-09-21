@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui one column grid stackable">
            <div class="column">
                <div class="admin-single-inbox-card">
                    <div class="header">
                        <h2>Twoje formularze</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">
                            <div class="ui one grid stackable">
                                <div class="column">

                                    <div class="ui grid stackable">
                                        <div class="fourteen wide column">
                                            <div class="column">
                                                <div class="topic">
                                                    {{ $inbox->topic }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two wide column">
                                            <div class="column">
                                                <div class="date">
                                                    {{ $inbox->created_at->format('Y-m-d - H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="topic">
                                        <div class="sixteen wide column">
                                            @foreach($threads as $thread)
                                                <div class="column">
                                                    <div class="ui grid stackable">
                                                        <div class="fourteen wide column">
                                                            <div class="sender">
                                                                @if($thread->sender == 'support')
                                                                    <b>Support</b>
                                                                @else
                                                                    <b>{{ $user->email }}</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="two wide column">
                                                            <div class="date-thread">
                                                                {{ $thread->created_at->format('Y-m-d - H:i') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column">
                                                    <div class="content-thread">
                                                        <p>{{ $thread->content }}</p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                            <div class="column">
                                                <div class="thread-form">
                                                    <form action="{{ route('question-thread-admin', $inbox->id) }}" method="post" class="ui form">
                                                        @csrf
                                                        <div class="field">
                                                            <label>Odpowiedz:</label>
                                                            <textarea name="answer" placeholder="Odpowiedz" rows="5" class="custom-input"></textarea>
                                                        </div>
                                                        <div class="button submit">
                                                            <button class="ui save button">
                                                                <i class="send icon"></i>
                                                                Wyślij
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection