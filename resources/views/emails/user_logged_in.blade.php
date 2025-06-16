@component('mail::message')
# Hello, {{ $user->name }}

You have just logged in to your Glamour Salon account.

If this wasn't you, please reset your password immediately.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
