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

        <div class="ui grid stackable cont">

          <div class="sixteen wide column">
              {{--<div class="ui three column grid stackable">--}}
                  {{--<div class="column">--}}
                      {{--<div class="payment-1-card">--}}
                          {{--<div class="header">--}}
                              {{--<h2>12 zł</h2>--}}
                          {{--</div>--}}
                          {{--<div class="content">--}}
                              {{--<div class="card-container">--}}
                                {{--<div class="status name">--}}
                                  {{--<p>Basic</p>--}}
                                {{--</div>--}}
                                {{--<hr class="pay-name">--}}
                                {{--<div class="pay-allow">--}}
                                  {{--<li>Dostęp do wszystkich narzędzi konta</li>--}}
                                  {{--<li>1 miesiąc aktywnego konta</li>--}}
                                  {{--<li>Możliwość wystawienia jednocześnie 2 formularzy</li>--}}
                                {{--</div>--}}
                                {{--<div class="button-submit">--}}
                                 {{--<button>--}}
                                      {{--<a href="{{ route('select-bank', [Auth::id(), 1]) }}">--}}
                                      {{--Kup--}}
                                      {{--</a>--}}
                                  {{--</button>--}}
                                {{--</div>--}}
                              {{--</div>--}}
                          {{--</div>--}}
                      {{--</div>--}}
                  {{--</div>--}}

                  {{--<div class="column">--}}
                      {{--<div class="payment-2-card">--}}
                          {{--<div class="header">--}}
                              {{--<h2>27 zł</h2>--}}
                          {{--</div>--}}
                          {{--<div class="content">--}}
                              {{--<div class="card-container">--}}
                                {{--<div class="status name">--}}
                                  {{--<p>Primary</p>--}}
                                {{--</div>--}}
                                {{--<hr class="pay-name">--}}
                                {{--<div class="pay-allow">--}}
                                  {{--<li>Dostęp do wszystkich narzędzi konta</li>--}}
                                  {{--<li>3 miesiąc aktywnego konta</li>--}}
                                  {{--<li>Możliwość wystawienia jednocześnie 4 formularzy</li>--}}
                                {{--</div>--}}
                                {{--<div class="button-submit">--}}
                                  {{--<button>--}}
                                      {{--<a href="{{ route('select-bank', [Auth::id(), 2]) }}">--}}
                                      {{--Kup--}}
                                      {{--</a>--}}
                                  {{--</button>--}}
                                {{--</div>--}}
                              {{--</div>--}}
                          {{--</div>--}}
                      {{--</div>--}}
                  {{--</div>--}}

                  {{--<div class="column">--}}
                      {{--<div class="payment-3-card">--}}
                          {{--<div class="header">--}}
                              {{--<h2>45 zł</h2>--}}
                          {{--</div>--}}
                          {{--<div class="content">--}}
                              {{--<div class="card-container">--}}
                                {{--<div class="status name">--}}
                                  {{--<p>Pro</p>--}}
                                {{--</div>--}}
                                {{--<hr class="pay-name">--}}
                                {{--<div class="pay-allow">--}}
                                  {{--<li>Dostęp do wszystkich narzędzi konta</li>--}}
                                  {{--<li>6 miesiąc aktywnego konta</li>--}}
                                  {{--<li>Nieograniczona ilośc wystawionych formularzy</li>--}}
                                {{--</div>--}}
                                {{--<div class="button-submit">--}}

                                    {{--<button>--}}
                                       {{--<a href="{{ route('select-bank', [Auth::id(), 2]) }}">--}}
                                      {{--Kup--}}
                                      {{--</a>--}}
                                    {{--</button>--}}

                                {{--</div>--}}
                              {{--</div>--}}
                          {{--</div>--}}
                      {{--</div>--}}
              {{--</div>--}}
          {{--</div>--}}

             <div class="ui two column grid stackable">
                 <div class="column">
                     <div class="ui grid stackable center-col">
                         <div class="ten wide column pay-custom">
                             <div class="card payment first">
                                 <div class="header">
                                     <div class="first-hr">
                                         <hr>
                                     </div>
                                     <div class="package">
                                         <h2>Single Form</h2>
                                     </div>
                                     <div class="first-p">
                                         <p>PAKIET</p>
                                     </div>
                                     <div class="select option">
                                         <form class="ui form" method="POST" action="{{ route('select-bank', Auth::id()) }}">
                                             @csrf
                                             <input type="hidden" name="package"  value="1">
                                             <div class="field pack">
                                                 <p>1 formularz</p>
                                             </div>
                                             <div class="field">
                                                 <div class="twice-hr">
                                                     <hr>
                                                 </div>
                                             </div>
                                             <div class="field">
                                                 <div class="twice-p">
                                                     <p>PODSUMOWANIE</p>
                                                 </div>
                                                 <ul class="first-summary">
                                                     <li>
                                                         Produkt: <b>1 formularz</b>
                                                     </li>
                                                     <li>
                                                         Cena: <b>4,99 zł</b>
                                                     </li>
                                                     <li>
                                                         Oszczędzasz: <b>0%</b>
                                                     </li>
                                                 </ul>
                                             </div>

                                             <div class="field button">
                                                 <button>
                                                     Kup
                                                 </button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                            </div>
                         </div>
                     </div>
                 </div>
                 <div class="column">
                     <div class="ui grid stackable center-col">
                         <div class="ten wide column pay-custom">
                             <div class="card payment twice">
                                 <div class="header">
                                     <div class="first-hr">
                                         <hr>
                                     </div>
                                     <div class="package">
                                         <h2>Multi Form</h2>
                                     </div>
                                     <div class="first-p">
                                         <p>PAKIET</p>
                                     </div>
                                     <div class="select option">
                                         <form class="ui form" method="POST" action="{{ route('select-bank', Auth::id()) }}">
                                             @csrf
                                             <div class="field menu">
                                                 <div class="ui selection dropdown">
                                                     <input type="hidden" name="package" id="package-2">
                                                     <i class="dropdown icon"></i>
                                                     <div class="default text">Wybierz pakiet</div>
                                                     <div class="menu">
                                                         <div class="item" data-value="2">
                                                             <div class="pack">
                                                                 2 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 9,98zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="3">
                                                             <div class="pack">
                                                                 3 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 13,97zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="4">
                                                             <div class="pack">
                                                                 4 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 18,46zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="5">
                                                             <div class="pack">
                                                                 5 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 22,95zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="6">
                                                             <div class="pack">
                                                                 6 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 27,44zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="7">
                                                             <div class="pack">
                                                                 7 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 31,93zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="8">
                                                             <div class="pack">
                                                                 8 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 35,92zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="9">
                                                             <div class="pack">
                                                                 9 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 41,41zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="10">
                                                             <div class="pack">
                                                                 10 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 45zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="15">
                                                             <div class="pack">
                                                                 15 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 64,87zł
                                                             </div>
                                                         </div>
                                                         <div class="item" data-value="20">
                                                             <div class="pack">
                                                                 20 <i class="far fa-file-alt"></i>
                                                             </div>
                                                             <div class="price">
                                                                 84,83zł
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="field">
                                                 <div class="twice-hr">
                                                     <hr>
                                                 </div>
                                             </div>
                                             <div class="field">
                                                 <div class="twice-p">
                                                     <p>PODSUMOWANIE</p>
                                                 </div>
                                                 <ul class="summary">
                                                     <li class="package-f">

                                                     </li>
                                                     <li class="package-p">

                                                     </li>
                                                     <li class="package-r">

                                                     </li>
                                                 </ul>
                                             </div>

                                             <div class="field button">
                                                 <button>
                                                     Kup
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



            <div class="sixteen wide column">
                <div class="invoice-card">
                    <div class="header">
                        <h2>Inbox</h2>
                    </div>

                    <div class="content">
                        <div class="card-container">

                            <table class="ui very basic table">
                                <thead>
                                <tr><th class="th-1">ID transakcji</th>
                                    <th class="th-2">Status</th>
                                    <th class="th-3">Rodzaj</th>
                                    <th class="th-4">Data</th>
                                    <th class="th-5">Generuj fakturę</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($transactions as $tr)

                                    <tr>
                                        <td>
                                            {{ $tr->tr_id }}
                                        </td>
                                        <td>
                                            {{ $tr->tr_log }}
                                        </td>
                                        <td>
                                            @if($tr->tr_type == 1)
                                                Basic
                                            @elseif($tr->tr_type == 2)
                                                Primary
                                            @elseif($tr->tr_type == 3)
                                                Pro
                                            @endif
                                        </td>
                                        <td>
                                            {{ $tr->tr_date }}
                                        </td>
                                        <td>
                                            {{--<form action="{{ route('inv-download', $user->id) }}" method="post">--}}
                                                {{--<button class="ui icon button add-invoice">--}}
                                                    {{--<i class="download icon"></i>--}}
                                                {{--</button>--}}
                                            {{--</form>--}}
                                            <a href="{{ route('inv-download', [$user->id, $tr->id]) }}"><i class="download icon"></i></a>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                            {{ $transactions }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


            <script>
                const select = document.querySelector('input[id="package-2"]');

                select.addEventListener('change', function() {

                    const first = document.querySelector('ul[class="summary"]');
                    const p_1 = document.querySelector('li[class="package-f"]');
                    const p_2 = document.querySelector('li[class="package-p"]');
                    const p_3 = document.querySelector('li[class="package-r"]');

                    p_1.innerHTML = 'Produkt: <b>'+ this.value +' formularze</b>';

                    if(this.value == 2)
                    {
                        p_2.innerHTML = 'Cena: <b>9,98 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>0%</b>';
                    }
                    else if(this.value == 3)
                    {
                        p_2.innerHTML = 'Cena: <b>13,97 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>20%</b>';
                    }
                    else if(this.value == 4)
                    {
                        p_2.innerHTML = 'Cena: <b>18,46 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>30%</b>';
                    }
                    else if(this.value == 5)
                    {
                        p_2.innerHTML = 'Cena: <b>22,95 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>40%</b>';
                    }
                    else if(this.value == 6)
                    {
                        p_2.innerHTML = 'Cena: <b>27,44 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>50%</b>';
                    }
                    else if(this.value == 7)
                    {
                        p_2.innerHTML = 'Cena: <b>31,93 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>70%</b>';
                    }
                    else if(this.value == 8)
                    {
                        p_2.innerHTML = 'Cena: <b>35,92 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>80%</b>';
                    }
                    else if(this.value == 9)
                    {
                        p_2.innerHTML = 'Cena: <b>41,41 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>80%</b>';
                    }
                    else if(this.value == 10)
                    {
                        p_2.innerHTML = 'Cena: <b>45,00 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>100% (1 formularz)</b>';
                    }
                    else if(this.value == 15)
                    {
                        p_2.innerHTML = 'Cena: <b>64,87 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>200% (2 formularze)</b>';
                    }
                    else if(this.value == 20)
                    {
                        p_2.innerHTML = 'Cena: <b>84,83 zł</b>';
                        p_3.innerHTML = 'Oszczędzasz: <b>300% (3 formularze)</b>';
                    }

                    console.log(p_2);


                    first.appendChild(p_1);
                    first.appendChild(p_2);
                    first.appendChild(p_3);

                });
            </script>

@endsection