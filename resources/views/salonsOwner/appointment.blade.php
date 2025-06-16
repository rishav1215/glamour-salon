@extends('layouts.header')

@section('content')
<div class="container py-8">
    <h2 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->name }}</h2>

    <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
        <h3 class="text-xl font-semibold mb-4">Your Salon: {{ $salon->name }}</h3>
        <p>Location: {{ $salon->location }}</p>
        <p>Services: {{ $salon->services }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Upcoming Appointments</h3>
        @if($bookings->count())
            <table class="w-full table-auto border">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Client</th>
                        <th class="border px-4 py-2">Contact</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td class="border px-4 py-2">{{ $booking->name }}</td>
                            <td class="border px-4 py-2">{{ $booking->contact }}</td>
                            <td class="border px-4 py-2">{{ $booking->email }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($booking->appointment_time)->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No appointments yet.</p>
        @endif
    </div>
</div>
@endsection
