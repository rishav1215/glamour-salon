@extends('layouts.header')

@section('content')
    <!-- Hero Section with Full-Width Background -->
    <section class="relative bg-gradient-to-br from-indigo-900 to-purple-800 text-white py-20 md:py-32">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Discover & Book Premium Salon Services
                </h1>
                <p class="text-xl md:text-2xl text-indigo-100 mb-10">
                    Elevate your beauty experience with top-rated professionals in your area.
                </p>
                <div class="flex flex-wrap gap-4">
                    @auth
                        <a href="{{ route('salon.create') }}" 
                           class="bg-white text-indigo-900 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Register Your Salon
                        </a>
                        <a href="#salons" 
                           class="bg-transparent border-2 border-white hover:bg-white hover:text-indigo-900 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105">
                            Browse Salons
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="bg-white text-indigo-900 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Login to Continue
                        </a>
                        <a href="#salons" 
                           class="bg-transparent border-2 border-white hover:bg-white hover:text-indigo-900 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105">
                            Browse Salons
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;"></div>
    </section>

    <!-- Featured Salons Section -->
    <section id="salons" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Our Premium Salon Partners
                </h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
            </div>

            @if($salons->where('status', 'active')->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($salons->where('status', 'active') as $salon)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-2xl font-bold text-white">{{ $salon->name }}</h3>
                                <div class="flex items-center text-gray-200 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $salon->location }}</span>
                                </div>
                            </div>
                            <span class="absolute top-4 right-4 bg-white/90 text-indigo-600 text-xs font-bold px-3 py-1 rounded-full shadow">
                                OPEN NOW
                            </span>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             class="h-5 w-5 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300' }}" 
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                    <span class="ml-2 text-gray-600 text-sm">4.8 (120 reviews)</span>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 mb-6">{{ Str::limit($salon->services, 100) }}</p>
                            
                            <div class="flex justify-between items-center">
                                <a href="{{ route('salon.show', $salon->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    View Details
                                </a>
                                
                                @auth
                                    <a href="{{ route('bookings.create', $salon->id) }}" 
                                       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-5 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                        Book Now
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" 
                                       class="bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900 text-white px-5 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                        Login to Book
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-xl shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No active salons available</h3>
                    <p class="mt-1 text-gray-500">Check back later or register your own salon</p>
                    @auth
                        @if(Auth::user()->role === 'salon_owner')
                            <a href="{{ route('salon.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Register Your Salon
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            @if($salon->where('status', 'active')->count() > 6)
            <div class="text-center mt-12">
                <a href="#" class="inline-block border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white px-8 py-3 rounded-full font-bold transition-colors duration-300">
                    View All Salons
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Featured Salons Section -->
    {{-- <section id="salons" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Our Premium Salon Partners
                </h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($salons as $salon)
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">{{ $salon->name }}</h3>
                            <div class="flex items-center text-gray-200 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $salon->location }}</span>
                            </div>
                        </div>
                        <span class="absolute top-4 right-4 bg-white/90 text-indigo-600 text-xs font-bold px-3 py-1 rounded-full shadow">
                            OPEN NOW
                        </span>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                @for($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="h-5 w-5 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300' }}" 
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <span class="ml-2 text-gray-600 text-sm">4.8 (120 reviews)</span>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-6">{{ Str::limit($salon->services, 100) }}</p>
                        
                        <div class="flex justify-between items-center">
                            <a href="{{ route('salon.show', $salon->id) }}" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                View Details
                            </a>
                            
                            @auth
                                <a href="{{ route('bookings.create', $salon->id) }}" 
                                   class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-5 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                    Book Now
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900 text-white px-5 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                    Login to Book
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($salons->count() > 6)
            <div class="text-center mt-12">
                <a href="#" class="inline-block border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white px-8 py-3 rounded-full font-bold transition-colors duration-300">
                    View All Salons
                </a>
            </div>
            @endif
        </div>
    </section> --}}

    <!-- How It Works Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    How It Works
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Booking your perfect salon experience in just a few simple steps
                </p>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mt-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-indigo-600 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Find Your Salon</h3>
                    <p class="text-gray-600">
                        Browse our curated selection of top-rated salons and beauty professionals in your area.
                    </p>
                </div>
                
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-indigo-600 text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Choose Your Service</h3>
                    <p class="text-gray-600">
                        Select from a wide range of services, view prices, and check real-time availability.
                    </p>
                </div>
                
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-indigo-600 text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Book & Enjoy</h3>
                    <p class="text-gray-600">
                        Secure your appointment with just a few clicks and enjoy your beauty experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- User Role Selection (for logged in users) -->
    @auth
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Continue Your Journey
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    How would you like to use our platform today?
                </p>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mt-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if(Auth::user()->role === 'salon_owner')
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-indigo-600 transform transition hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex items-start mb-6">
                        <div class="bg-indigo-100 p-4 rounded-xl mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Salon Owner Dashboard</h3>
                            <p class="text-gray-600">
                                Manage your salon profile, services, staff, and appointments all in one place.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('salon.create') }}" 
                       class="inline-block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                        Go to Dashboard
                    </a>
                </div>
                @endif
                
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-pink-600 transform transition hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex items-start mb-6">
                        <div class="bg-pink-100 p-4 rounded-xl mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Customer Experience</h3>
                            <p class="text-gray-600">
                                Book appointments, save your favorite salons, and discover new beauty services.
                            </p>
                        </div>
                    </div>
                    <a href="#salons" 
                       class="inline-block w-full text-center bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                        Browse Salons
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endauth

    <!-- Testimonials Section -->
    <section class="py-20 bg-indigo-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    What Our Clients Say
                </h2>
                <p class="text-xl text-indigo-200 max-w-2xl mx-auto">
                    Don't just take our word for it - hear from our satisfied customers
                </p>
                <div class="w-24 h-1 bg-white mx-auto mt-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                    <div class="flex mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-lg italic mb-6">
                        "Found my perfect hairstylist through this platform. The booking process was seamless and the service was exceptional!"
                    </p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah J." class="w-12 h-12 rounded-full mr-4 border-2 border-white">
                        <div>
                            <h4 class="font-bold">Sarah Johnson</h4>
                            <p class="text-indigo-200 text-sm">Regular Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Additional testimonials would go here -->
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Ready to Transform Your Beauty Experience?
            </h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">
                Join thousands of satisfied customers who've discovered their perfect salon match.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @auth
                    <a href="#salons" class="bg-white text-indigo-900 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Browse Salons
                    </a>
                    @if(Auth::user()->role === 'salon_owner')
                        <a href="{{ route('salon.create') }}" class="bg-transparent border-2 border-white hover:bg-white/10 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105">
                            Salon Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="bg-white text-indigo-900 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Sign Up Now
                    </a>
                    <a href="{{ route('login') }}" class="bg-transparent border-2 border-white hover:bg-white/10 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </section>
@endsection