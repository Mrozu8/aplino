@component('mail::message')

Kliknij w link potwierdzający aby zmienić hasło.

@component('mail::button', ['url' => route('company-update-password', [$user->id, $password])])

Jeśli nie zmieniałeś hasła w ustawieniach zignoruj ten email.

@endcomponent
<br>
<br><br>
Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent