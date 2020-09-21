@extends('layouts.admin')
@section('content')


    @include('admin.left-sidebar')


    <div class="admin-custom-container">
        <div class="ui grid stackable">

            <div class="sixteen wide column">
                <div class="admin-statistic-card">
                    <div class="header">
                        <h2>Statistic</h2>
                    </div>

                    <div class="content">
                        <div class="card-container">

                            Zadania Crone

                            <a href="{{ route('crone-form') }}"><button>Wygaśnięcie formularzy</button></a>
                            {{--<a href="{{ route('crone-mail') }}"><button>Emaile przed wygaśnieciem formularzy</button></a>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection