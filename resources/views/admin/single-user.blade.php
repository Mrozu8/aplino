@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui grid stackable">

            <div class="ten wide column">
                <div class="company-card">
                    <div class="company-header">
                        <h2>Wizytówka</h2>
                    </div>

                    <div class="company-content">
                        <div class="card-container">
                            <div class="ui grid stackable flex-grid">
                                <div class="sixteen wide column">
                                    <span class="company-name">SowIT</span>
                                    <hr>
                                </div>

                                <div class="six wide column">
                                    <span class="company-address">3-go Maja 25, Sośnica</span>
                                    <hr>
                                </div>
                                <div class="four wide column">
                                    <span class="company-address">+48 124 234 236</span>
                                    <hr>
                                </div>
                                <div class="six wide column">
                                    <span class="company-address">dominik.mrozek8@gmail.com</span>
                                    <hr>
                                </div>

                                <div class="sixteen wide column">
                                    <span class="company-address"><a href="#">http://sowit.pl/</a></span>
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
                        <h2>Statystyki</h2>
                    </div>

                    <div class="notification-content">
                        <div class="card-container">
                            <div class="ui grid stackable flex-grid">

                                <div class="twelve wide column">
                                    <div class="notification">Ilość CV</div>
                                </div>
                                <div class="four wide column">
                                    <b>22</b>
                                </div>

                                <div class="twelve wide column">
                                    <div class="notification">Aktywne formularze</div>
                                </div>
                                <div class="four wide column">
                                    <b>2</b>
                                </div>

                                <div class="space50"></div>

                                <div class="sixteen wide column">
                                    <div class="notification">Status konta</div>
                                    <hr>
                                </div>


                                <div class="sixteen wide column">
                                    <div class="ui grid stackable">
                                        <div class="seven wide column">
                                            <div class="notification-status-company">
                                                <p>Primary</p>
                                            </div>
                                        </div>

                                        <div class="two wide column custom-divider">
                                            <div class="divider-vert">

                                            </div>
                                        </div>

                                        <div class="seven wide column">
                                            <div class="notification-data-status-company">
                                                <p>19.05.2018</p>
                                            </div>
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
                        <h2>Ustawienia</h2>
                    </div>

                    <div class="inbox-content">
                        <div class="card-container">
                            <form action="" class="ui form">
                                <div class="ui grid stackable">
                                    <div class="seven wide column">
                                        <b>Zablokuj konto</b>
                                        <div class="space30"></div>
                                        <div class="inline field">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" tabindex="0" class="hidden">
                                                <label>Zablokowane</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="seven wide column">
                                        <b>Zmień status konta</b>

                                    </div>
                                    <div class="two wide column">
                                            <div class="button update">
                                                <button class="circular ui icon button">
                                                    <i class="plus icon"></i>
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </form>

                            <div class="space80"></div>

                            <div class="ui grid stackable">
                                <div class="twelve wide column">
                                    <div class="column">
                                        <form action="{{ route('question-admin', $user->id) }}" method="post" class="ui form">
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
        </div>
    </div>



@endsection