@extends('layouts.header')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Salon Header -->
            <div class="bg-gradient-to-r from-pink-500 to-purple-600 p-6 text-white">
                <h1 class="text-2xl font-bold text-center">{{ $salon->name }}</h1>
                <div class="flex items-center justify-center mt-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>{{ $salon->location }}</span>
                </div>
            </div>

            <!-- Booking Form -->       
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Book Your Appointment</h2>

                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="salon_id" value="{{ $salon->id }}">

                    <!-- Name Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="name" required
                                class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                                placeholder="John Doe">
                        </div>
                    </div>

                    <!-- Contact Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="tel" name="contact" required
                                class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                                placeholder="+1 (___) ___-____">
                        </div>
                    </div>

                    <!-- Email Field (for guests) -->
                    @guest
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" name="email" required
                                    class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                                    placeholder="your@email.com">
                            </div>
                        </div>
                    @endguest

                    <!-- Date and Time Selection -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Date Picker -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar-day text-gray-400"></i>
                                </div>
                                <input type="date" name="appointment_date" required id="appointment_date"
                                    class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent">
                            </div>
                        </div>


                        <!-- Time Picker -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                                <select name="appointment_time" required
                                    class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent">
                                    <option value="" disabled selected>Select time</option>
                                    @foreach(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'] as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Special Requests</label>
                        <textarea name="notes" rows="3"
                            class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                            placeholder="Any special requirements..."></textarea>
                    </div>
                    @if(session('error'))
    <div class="text-red-500 font-bold mb-4">
        {{ session('error') }}
    </div>
@endif
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white py-3 rounded-lg font-medium hover:from-pink-700 hover:to-purple-700 transition duration-300 shadow-md">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('appointment_date');

            const today = new Date();
            const tomorrow = new Date();
            tomorrow.setDate(today.getDate() + 1);

            const todayStr = today.toISOString().split('T')[0];
            const tomorrowStr = tomorrow.toISOString().split('T')[0];

            // Set min to today, max to tomorrow, and default to today
            dateInput.min = todayStr;
            dateInput.max = tomorrowStr;
            dateInput.value = todayStr;

            // Prevent typing or selecting other dates
            dateInput.addEventListener('input', function () {
                if (this.value !== todayStr && this.value !== tomorrowStr) {
                    this.setCustomValidity("Please select only today or tomorrow.");
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>

@endsection