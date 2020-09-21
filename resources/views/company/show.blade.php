@extends('layouts.inside')
@section('content')


    @include('company.left-sidebar')


    <div class="company-custom-container">
        <div class="ui grid stackable cont">

            <div class="ten wide column">
                <div class="company-card">
                    <div class="company-header">
                        <h2>Wizytówka</h2>
                    </div>

                    <div class="company-content">
                      <div class="card-container">
                          <div class="ui grid stackable flex-grid">
                                <div class="sixteen wide column">
                                    <span class="company-name">{{ $company->company_name }}</span>
                                    <hr>
                                </div>


                              <div class="four wide column">
                                  <span class="company-address">{{ $company->phone }}</span>
                                  <hr>
                              </div>
                              <div class="six wide column">
                                  <span class="company-address">{{ $company->email }}</span>
                                  <hr>
                              </div>
                              <div class="six wide column">
                                  <span class="company-address">{{ $company->address }}</span>
                                  <hr>
                              </div>

                              <div class="sixteen wide column">
                                  <span class="company-address"><a href="#">{{ $company->website }}</a></span>
                                  <hr>
                              </div>
                              <div class="sixteen wide column">
                                  <span class="company-address">{{ str_limit($company->description, 200) }}</span>
                                  <hr>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="six wide column">
                <div class="notification-card">
                    <div class="notification-header">
                        <h2>Powiadomienia</h2>
                    </div>

                    <div class="notification-content">
                        <div class="card-container">
                            <div class="ui grid stackable flex-grid">

                                <div class="sixteen wide column notify-content">
                                    <div class="notification">Nowe CV <hr> </div>
                                    <a href="{{ route('company-form', Auth::id()) }}"> <div class="notification-q">{{ $cv }}</div></a>
                                </div>

                                <div class="sixteen wide column notify-content">
                                    <div class="notification">Wiadomości <hr> </div>
                                    <a href="{{ route('crone', Auth::id()) }}"> <div class="notification-q">{{ $inbox }}</div></a>
                                    <a href="{{ route('company-inbox', Auth::id()) }}"> <div class="notification-q">{{ $inbox }}</div></a>
                                </div>


                                <div class="sixteen wide column">
                                    <div class="notification">Status konta</div>
                                    <hr>
                                </div>


                                <div class="sixteen wide column">
                                    <div class="ui grid stackable custom-data">

                                       <div class="notification-status-company">
                                            <p>{{ $status }}</p>
                                       </div>

                                        <div class="custom-divider">
                                            <div class="divider-vert">
                                            </div>
                                        </div>

                                        <div class="notification-data-status-company">
                                            <p>{{ $company->status_close }}</p>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sixteen wide column">
                <div class="inbox-card">
                    <div class="inbox-header">
                        <h2>Inbox</h2>
                    </div>

                    <div class="inbox-content">
                        <div class="card-container">

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



@endsection

