@component('mail::message')
<h2>From: {{$details['name']}}</h2>
<h2>Email: {{$details['email']}}</h2>
<h2>Subject: {{$details['title']}}</h2>
<p>{{$details['body']}}</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8002/'])
Visit Site
@endcomponent

Thank You,<br>
{{ config('app.name') }}
@endcomponent