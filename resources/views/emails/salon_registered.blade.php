<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@component('mail::message')
# Welcome, {{ $salon->user->name }}!

Your salon **{{ $salon->name }}** has been successfully registered and approved.

@component('mail::panel')
**Location:** {{ $salon->location }}  
**Services:** {{ $salon->services }}
@endcomponent

Thanks for choosing **Glamour Salon**!

@endcomponent
    