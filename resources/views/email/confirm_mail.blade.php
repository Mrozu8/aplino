@component('mail::message')

Ostatni krok!

@component('mail::button', ['url' => route('confirm_email', $email) . '?hash=' . $hash ])
Zweryfikuj swoje konto
@endcomponent
<br>
<br><br>
Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent