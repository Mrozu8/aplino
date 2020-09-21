@component('mail::message')

Dziękujemy za zakup pakietu  !!!!
Status transakcji: prawidłowy
ID transakcji: {{ $tr_id }}
Ilość pakietów: {{ $tr_type }}

{{--@component('mail::button', ['url' => route('company-update-password', [$user->id, $password])])--}}

{{--Jeśli nie zmieniałeś hasła w ustawieniach zignoruj ten email.--}}

{{--@endcomponent--}}
<br>
<br><br>
Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent