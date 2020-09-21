@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui grid stackable">

            <div class="ten wide column">
                <div class="admin-settings-card">
                    <div class="header">
                        <h2>Coś tam</h2>
                    </div>

                    <div class="content">
                        <div class="card-container">

                        </div>
                    </div>
                </div>
            </div>

            <div class="six wide column">
                <div class="password-card">
                    <div class="header">
                        <h2>Zmiana hasła</h2>
                    </div>

                    <div class="content">
                        <div class="card-container">
                            <form action="{{ route('admin-update-password') }}" class="ui form" method="post">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="ui grid stackable flex-grid">

                                    <div class="sixteen wide column">
                                        <div class="field">
                                            <label for="">Nowe hasło:</label>
                                            <input type="password" name="password" class="custom-input" required>
                                        </div>
                                    </div>
                                    <div class="sixteen wide column">
                                        <div class="field">
                                            <label for="">Powtórz hasło:</label>
                                            <input type="password" name="password_confirmation" class="custom-input" required>
                                        </div>
                                    </div>
                                    <div class="button submit group">
                                        <button class="ui save button">
                                            <i class="save icon"></i>
                                            Zapisz
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



@endsection