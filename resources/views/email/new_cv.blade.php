@component('mail::message')

Masz nowe zgłoszenie


{{--@component('mail::button', ['url' => route('confirm_email', $email) . '?hash=' . $hash ])--}}
Odwiedź swoje konto
<br>
<br><br>
Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent