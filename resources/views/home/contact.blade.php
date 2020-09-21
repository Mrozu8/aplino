@extends('layouts.app')
@section('content')

    <div class="ui one column grid stackable">
        <div class="column">
            <div class="contact-img">
                <div class="offer-img-mask">

                </div>
            </div>
        </div>
    </div>

    <div class="ui container">
        <div class="ui one column grid stackable">
            <div class="column">
                <div class="contact-card">
                    <div class="ui grid stackable">
                        <div class="ten wide column">
                            <div class="contact-form-site">
                                <div class="contact-header">
                                    <p><i class="envelope open outline icon"></i> Lorem ipsum dolor</p>
                                </div>
                                <div class="contact-form">

                                    <form class="ui form contact">

                                        <div class="field">
                                            <input type="text" name="first-name" placeholder="First Name" class="custom-form-contact">
                                        </div>

                                        <div class="field">
                                            <input type="email" name="last-name" placeholder="Email" class="custom-form-contact">
                                        </div>

                                        <div class="field">
                                            <textarea name="content"  cols="30" rows="5" class="custom-form-contact" placeholder="Content"></textarea>
                                        </div>

                                        <div class="button-form">
                                            <button class="circular ui icon button">
                                                <i class="send outline icon"></i>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="six wide column address-custom">
                            <div class="contact-address-site">

                                <div class="address-header">
                                    <p>Kontakt</p>
                                </div>

                                <div class="address-data">
                                    <p>
                                        <i class="location arrow icon"></i> Aleja Powstańców Warszawy 10, Rzeszów
                                    </p>
                                    <p>
                                        <i class="phone icon"></i> + 48 723 123 324
                                    </p>
                                    <p>
                                        <i class="envelope icon"></i> mrozek.dominik8@gmail.com
                                    </p>
                                </div>

                                <div class="address-hr"></div>

                                <div class="address-button-media">
                                    <button class="ui circular facebook icon button">
                                        <i class="facebook icon"></i>
                                    </button>
                                    <button class="ui circular twitter icon button">
                                        <i class="twitter icon"></i>
                                    </button>
                                    <button class="ui circular linkedin icon button">
                                        <i class="linkedin icon"></i>
                                    </button>
                                    <button class="ui circular google plus icon button">
                                        <i class="google plus icon"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="space90"></div>--}}

@endsection