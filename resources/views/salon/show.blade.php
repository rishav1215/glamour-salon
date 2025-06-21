@extends('layouts.header')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-primary-600 mb-4">{{ $salon->name }}</h1>
        <p class="text-gray-700 mb-4">{{ $salon->description }}</p>
        <p><strong>Address:</strong> {{ $salon->address }}</p>
        <p><strong>Phone:</strong> {{ $salon->phone }}</p>
        <!-- Add more fields as needed -->

        @auth
            <a href="{{ route('bookings.create', $salon->id) }}"
                class="mt-6 inline-block bg-secondary-600 hover:bg-secondary-500 text-white px-4 py-2 rounded-lg shadow-md transition">
                Book Appointment
            </a>
        @endauth
    </div>
</div>
@endsection
