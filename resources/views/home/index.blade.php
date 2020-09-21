@extends('layouts.app')
@section('content')


    <div class="ui one column grid stackable custom-home">
        <div class="column">
            <div class="img-home">
                <div class="img-block-home">
                    <div class="img-text">
                        <h2>Szukasz pracy ?  My Ci w tym pomożemy</h2>
                    </div>

                    <div class="img-input">
                                <div class="ui transparent icon input">
                                    <input class="prompt" type="text" placeholder="Search job">
                                    <i class="search link icon"></i>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space90"></div>

    <div class="ui container">
        <div class="ui two column grid stackable">
            <div class="column">
                <div class="img-job-home">

                </div>
            </div>
            <div class="column">
                <div class="step-elements">

                    <div class="step-one">
                        <div class="ui grid stackable">
                            <div class="ui twelve wide column step">
                                <div class="column">
                                    <p>Wyszukaj ofertę w twojej okolicy</p>
                                </div>
                            </div>
                            <div class="ui four wide column">
                                <div class="column">
                                    <div class="img-offer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-two">
                        <div class="ui grid stackable">
                            <div class="ui twelve wide column step">
                                <div class="column">
                                    <p>Wypełnij spersonalizowany formularz </p>
                                </div>
                            </div>
                            <div class="ui four wide column">
                                <div class="column">
                                    <div class="img-offer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-three">
                        <div class="ui grid stackable">
                            <div class="ui twelve wide column step">
                                <div class="column">
                                    <p>Zacznij nową przygodę</p>
                                </div>
                            </div>
                            <div class="ui four wide column">
                                <div class="column">
                                    <div class="img-offer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="ui one column grid stackable custom-home">
        <div class="column">
            <div class="home-belt">
                <h2>Znajdź najlepszą ofertę</h2>
            </div>
        </div>
    </div>

    <div class="ui container">
        <div class="offer-block">
            <div class="ui two column grid stackable">
                <div class="column">
                    <div class="offer-find">
                        <h2 class="offer-f">Wybierz lokalizację która cię interesuje</h2>
                        <div class="find-input">
                            <div class="ui form">
                                <div class="field">
                                    <div class="ui selection dropdown voi">
                                        <input type="hidden" name="gender">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Województwo</div>
                                        <div class="menu">
                                            <div class="item" data-value="Dolnośląskie">Dolnośląskie</div>
                                            <div class="item" data-value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</div>
                                            <div class="item" data-value="Lubelskie">Lubelskie</div>
                                            <div class="item" data-value="Lubuskie">Lubuskie</div>
                                            <div class="item" data-value="Łódzkie">Łódzkie</div>
                                            <div class="item" data-value="Małopolskie">Małopolskie</div>
                                            <div class="item" data-value="Mazowieckie">Mazowieckie</div>
                                            <div class="item" data-value="Opolskie">Opolskie</div>
                                            <div class="item" data-value="Podkarpackie">Podkarpackie</div>
                                            <div class="item" data-value="Podlaskie">Podlaskie</div>
                                            <div class="item" data-value="Pomorskie">Pomorskie</div>
                                            <div class="item" data-value="Śląskie">Śląskie</div>
                                            <div class="item" data-value="Świętokrzyskie">Świętokrzyskie</div>
                                            <div class="item" data-value="Warmińsko-Mazurskie">Warmińsko-mazurskie</div>
                                            <div class="item" data-value="Wielkopolskie">Wielkopolskie</div>
                                            <div class="item" data-value="Zachodniopomorskie">Zachodniopomorskie</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field find-custom">
                                    <button class="find-button"><a href="">Szukaj</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="offer-count">
                        <h2 class="offer-q">Liczba czekających na Ciebie ofert</h2>
                        <div class="q">
                            <p class="vert">44</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home-cart">
        <div class="ui two column grid stackable custom-home">
            <div class="column">
                <div class="home-newsletter">
                    <div class="home-newsletter-mask">
                        <h2 class="newsletter-nag">Newsletter</h2>
                        <hr>
                        <div class="newsletter-text">
                            <p>Zapisz się na nasz Newsletter aby otrzymywać najnowsze informację dotyczące ofert pracy i znajeźć ją szybciej od innych.</p>
                        </div>
                        <div class="newsletter-form">
                            <form action="" class="ui form">
                                <div class="field">
                                    <input type="email" name="" class="newsletter-input">
                                    <button type="submit" class="newsletter-submit">Dołącz</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="home-company">
                    <div class="home-company-mask">
                        <h2 class="company-nag">Dla firm</h2>
                        <hr>
                        <div class="company-text">
                            <p>Masz dość staromodnej rekrutacji, przeglądania ton papieru i wielogodzinnego oceniania kandydatów ?  Skożystaj z naszej oferty i zaoszczędź czas - jest to najcenniejszy zasób jaki posiadasz.</p>
                        </div>
                        <div class="company-form">
                            <button class="company">Zobacz ofertę</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection