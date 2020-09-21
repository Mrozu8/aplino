@component('mail::message')




    {{ $status }}. Link do niego znajduje się pod adresem<br>
    @component('mail::button', ['url' => route('show-cv', [$company_name, $form_id])]) Twój formularz @endcomponent<br>
    Możesz udostępniać swój formularz lub wygenerować ulotkę do wydruku w swoim panelu użytkownika. <br>
    Nadchodzące zgłoszenia będą pojawiać się w twoim panelu użytkownika a Ciebie powiadamiać będziemy wysłanym mailem. <br>
    Jeśli nie chcesz otrzymywać e-maili z informacją o każdym zgłoszeniu, możesz wyłączyć tą opcję w ustawieniach @component('mail::button', ['url' => route('company-settings', [Auth::id()])]) Ustawienia konta @endcomponent<br>
    Życzymy udanej rekrutacji!

{{--tutaj @component('mail::button', ['url' => route('pdf-qr', [Auth::id(), $form_id])]) Ulotka @endcomponent--}}

<br>
<br><br>
Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent

