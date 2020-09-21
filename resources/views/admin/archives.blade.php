@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui one column grid stackable">

            <div class="column">
                <div class="admin-archives-card">
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
                                            <th class="th-3">Nazwa</th>
                                            <th class="th-4">Zawód</th>
                                            <th class="th-5">Data dodania</th>
                                            <th class="th-6">Ilość zgłoszeń</th>
                                            <th class="th-7">Aktywny</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($forms as $form)
                                            <tr>
                                                <td>
                                                    {{ $form->id }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-single-user', $form->user->id ) }}">{{ $form->user->id }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('show-cv', [$form->user->company_name, $form->id]) }}">{{ $form->title }}</a>
                                                </td>
                                                <td>
                                                    {{ $form->profession }}
                                                </td>
                                                <td>
                                                    {{ $form->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    {{ count($form->cv) }}
                                                </td>
                                                <td>
                                                    <form action="">
                                                        <button class="ui icon button add-xml">
                                                            <i class="download icon"></i>
                                                        </button>
                                                    </form>
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
        </div>
    </div>



@endsection