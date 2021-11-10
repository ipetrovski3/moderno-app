@component('mail::message')
<h2> Zdravo {{ $customer  }} </h2>

<p>{{ $message }}</p>


Blagodarime,<br>
{{ config('app.name') }}
@endcomponent
