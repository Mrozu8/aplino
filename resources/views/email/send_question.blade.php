@component('mail::message')
# Wiadomość od {{ $request->email_contact }}

Temat: {{ $request->topic }}<br>

{{ $request->content }}


@endcomponent