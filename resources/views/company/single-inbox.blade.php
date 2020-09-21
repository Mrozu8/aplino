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
                <div class="company-single-inbox-card">
                    <div class="header">
                        <h2>Twoje formularze</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">
                            <div class="ui one grid stackable">
                                <div class="column">

                                   <div class="ui grid stackable">
                                       <div class="twelve wide column">
                                           <div class="column">
                                               <div class="topic">
                                                   {{ $inbox->topic }}
                                               </div>
                                           </div>
                                       </div>
                                       <div class="four wide column">
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
                                                      <div class="twelve wide column">
                                                          <div class="sender">
                                                              @if($thread->sender == 'support')
                                                                  <b>Support</b>
                                                              @else
                                                                  <b>{{ $user->email }}</b>
                                                              @endif
                                                          </div>
                                                      </div>
                                                      <div class="four wide column">
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
                                                   <form action="{{ route('question-thread-company', [Auth::id(), $inbox->id]) }}" method="post" class="ui form">
                                                       @csrf
                                                       <div class="field">
                                                           <label>Odpowiedz:</label>
                                                           <textarea name="answer" placeholder="Odpowiedz" rows="5" class="custom-input"></textarea>
                                                           @if ($errors->has('answer'))
                                                               <div class="alert-validate">
                                                                   <strong>{{ $errors->first('answer') }}</strong>
                                                               </div>
                                                           @endif
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