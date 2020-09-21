@extends('layouts.inside')
@section('content')


    @include('company.left-sidebar')


    <div class="company-custom-container">
        <div class="ui one column grid stackable cont">

            <div class="column">
                <div class="archives-card">
                    <div class="header">
                        <h2>Twoje formularze</h2>
                    </div>

                    <div class="content">
                        <div class="container-card">
                            <div class="ui one grid stackable">
                                <div class="column">

                                    <form action="{{ route('company-archives', Auth::id()) }}" method="get" class="ui form search-inbox">
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
                                            <th class="th-2">Nazwa</th>
                                            <th class="th-3">Data dodania</th>
                                            <th class="th-4">Ilość zgłoszeń</th>
                                            <th class="th-5">Eksportuj do XML</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($forms as $form)
                                            <tr>
                                                <td>
                                                    {{ $id_form++ }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('company-single-archives', [Auth::id(), $form->id]) }}">{{ $form->title }}</a>
                                                </td>
                                                <td>
                                                    {{ $form->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    {{ count($form->cv) }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('group-cv-xml', [Auth::id(), $form->id]) }}">
                                                        @csrf
                                                        <button class="ui icon button add-xml">
                                                            <i class="download icon"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                         @endforeach

                                        </tbody>
                                    </table>
                                    {{ $forms }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="ui two column grid stackable cont">

                <div class="column">
                    <div class="archives-quantity-card">
                        <div class="content">
                            <div class="container-card">
                                <div class="ui one column grid stackable">
                                    <div class="column">
                                       <div class="header-quantity-card">
                                           <h2>Łączna ilość zgłoszeń</h2>
                                       </div>
                                    </div>
                                    <div class="column">
                                        <div class="content-quantity-card">
                                            <div class="ui two column grid stackable">
                                                <div class="column">
                                                    <div class="img-cont">
                                                        <div class="img-quantity">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column">
                                                    <div class="quantity-cont">
                                                        <p>{{ count($forms) }} Formularzy</p>
                                                        <p>{{ $cv }} CV</p>
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

                <div class="column">
                    <div class="archives-info-card">
                        <div class="content">
                            <div class="container-card">
                                <div class="ui one column grid stackable">
                                    <div class="column">
                                        <div class="header-info-card">
                                            <h2>Możliwości</h2>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content-info-card">
                                            <p>W archiwum masz dostęp do wszystkich stworzonych formularzy oraz przysłanych zgłoszeń CV. Dzięki naszym rozwiązaniom masz przejrzysty i łatwy dostęp do zgłoszeń, dzięki systemowi punktacji możesz w prosty sposób ocenić wartość CV, napisać notatkę lub oznaczyć jako wartościowe zgłoszenie. Udostępniamy również możliwość eksportowania formularzy do XML.</p>
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