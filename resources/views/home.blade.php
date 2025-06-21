@extends('layouts.header')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl p-8 md:p-12 mb-16 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover Your Perfect Salon Experience</h1>
            <p class="text-xl mb-8 max-w-2xl">Book appointments with the best salons in your area or register your own
                business.</p>
            @auth
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('salon.create') }}"
                        class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        Register Your Salon
                    </a>
                    <a href="#salons"
                        class="bg-indigo-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-900 transition duration-300">
                        Browse Salons
                    </a>
                </div>
            @else
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('login') }}"
                        class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        Login to Continue
                    </a>
                    <a href="#salons"
                        class="bg-indigo-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-900 transition duration-300">
                        Browse Salons
                    </a>
                </div>
            @endauth
        </div>

        <!-- Salon Listings -->
        <section id="salons" class="mb-20">
            {{-- <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 relative">
                <span class="bg-white px-4 relative z-10">Our Featured Salons</span>
                <span class="absolute left-0 right-0 top-1/2 h-0.5 bg-gray-200 z-0"></span>
            </h2> --}}

            <div class="py-12 bg-gray-50">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 relative">
                        <span class="bg-gray-50 px-4 relative z-10">Our Premium Salons</span>
                        <span class="absolute left-0 right-0 top-1/2 h-0.5 bg-gray-200 z-0"></span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach(\App\Models\Salon::where('is_approved', true)->get() as $salon)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}"
                                        class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-xl font-bold text-white">{{ $salon->name }}</h3>
                                        <div class="flex items-center text-gray-200">
                                            <i class="fas fa-map-marker-alt mr-2 text-sm"></i>
                                            <p class="text-sm">{{ $salon->location }}</p>
                                        </div>
                                    </div>
                                    <span
                                        class="absolute top-3 right-3 bg-white/90 text-primary-600 text-xs font-semibold px-2 py-1 rounded-full">
                                        OPEN NOW
                                    </span>
                                </div>
                                <div class="p-5">
                                    <div class="flex items-center mb-3">
                                        <div class="flex items-center">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300' }}"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                            <span class="ml-1 text-gray-600">4.8 (120)</span>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($salon->services, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                       <a href="{{ route('salon.show', $salon->id) }}"
    class="text-primary-600 font-medium hover:text-primary-800 transition flex items-center">
    <i class="fas fa-info-circle mr-2"></i> Details
</a>

                                        @auth
                                            <a href="{{ route('bookings.create', $salon->id) }}"
                                                class="bg-gradient-to-r from-gray-500 to-secondary-500 text-white px-4 py-2 rounded-lg hover:from-primary-600 hover:to-secondary-600 transition shadow-md hover:shadow-lg">
                                                Book Now
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="bg-gradient-to-r from-red-400 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-500 hover:to-red-700 transition shadow-md hover:shadow-lg">
                                                Login to Book
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @auth
            <!-- Role Selection Cards -->
            <section class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">How would you like to proceed?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-t-4 border-indigo-500 transform transition hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Salon Owner</h3>
                        </div>
                        <p class="text-gray-600 mb-6">Manage your salon profile, services, and appointments all in one place.
                        </p>
                        <a href="{{ route('salon.create') }}"
                            class="inline-block w-full text-center bg-indigo-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                            Owner Dashboard
                        </a>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-t-4 border-pink-500 transform transition hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Customer</h3>
                        </div>
                        <p class="text-gray-600 mb-6">Book appointments, save your favorites, and discover new beauty services.
                        </p>
                        <a href="#"
                            class="inline-block w-full text-center bg-pink-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-pink-600 transition">
                            Browse Services
                        </a>
                    </div>
                </div>
            </section>
        @endauth
    </div>

    <!-- Testimonial Section -->
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">What Our Clients Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="flex mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <p class="text-gray-600 mb-4">"Found my perfect hairstylist through this platform. The booking process
                        was seamless and the service was exceptional!"</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-300 mr-3 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah J."
                                class="h-full w-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Sarah J.</h4>
                            <p class="text-sm text-gray-500">Regular Customer</p>
                        </div>
                    </div>
                </div>

                <!-- Repeat similar blocks for other testimonials -->
            </div>
        </div>
    </div>
@endsection