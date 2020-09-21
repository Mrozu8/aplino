@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui grid stackable">

            <div class="sixteen wide column">
                <div class="admin-user-card">
                    <div class="header">
                        <h2>Statistic</h2>
                    </div>

                    <div class="content">
                        <div class="card-container">
                            <table class="ui very basic table">
                                <thead>
                                <tr><th class="th-1">ID</th>
                                    <th class="th-2">Email</th>
                                    <th class="th-3">Status</th>
                                    <th class="th-4">CV</th>
                                    <th class="th-5">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>

                                            <td>
                                                {{ $user->email }}
                                            </td>

                                            <td>
                                                Primary
                                            </td>

                                            <td>
                                                Primary
                                            </td>

                                            <td>
                                                <a href="{{ route('admin-single-user', $user->id) }}" class="edit-table">
                                                    <i class="edit icon"></i>
                                                </a>
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



@endsection