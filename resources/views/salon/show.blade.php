@extends('layouts.header')

@section('content')
@if(session('error'))
    <div class="fixed top-4 right-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg z-50" role="alert">
        <p>{{ session('error') }}</p>
    </div>
@endif
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg z-50" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif

<!-- Hero Section -->
<div class="relative bg-indigo-900 text-white py-16 md:py-24">
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $salon->name }}</h1>
            <div class="flex justify-center items-center">
                <div class="flex text-yellow-400 mr-2">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($salon->average_rating))
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        @endif
                    @endfor
                </div>
                <span class="text-indigo-200">{{ $salon->average_rating ? number_format($salon->average_rating, 1) : 'No ratings' }} ({{ $salon->reviews_count }} reviews)</span>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-0"></div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12 -mt-16 relative z-10">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="flex flex-col lg:flex-row">
            <!-- Salon Image & Basic Info -->
            <div class="w-full lg:w-1/3 bg-gray-50 p-6 border-r border-gray-200">
                <div class="aspect-w-1 aspect-h-1 rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}" class="w-full h-full object-cover">
                </div>
                
                <div class="space-y-6">
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Location
                        </h3>
                        <p class="text-gray-600">{{ $salon->address }}, {{ $salon->city }}, {{ $salon->state }} {{ $salon->postal_code }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Contact
                        </h3>
                        <p class="text-gray-600">{{ $salon->contact_number }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Hours
                        </h3>
                        <p class="text-gray-600">{{ $salon->opening_hours }}</p>
                    </div>
                    
                    @auth
                    <div class="pt-4">
                        <a href="{{ route('bookings.create', $salon->id) }}"
                            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-medium text-center block transition-all duration-300 transform hover:scale-[1.02] shadow-md">
                            Book Appointment
                        </a>
                    </div>
                    @else
                    <div class="pt-4">
                        <a href="{{ route('login') }}"
                            class="w-full bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900 text-white px-6 py-3 rounded-lg font-medium text-center block transition-all duration-300 transform hover:scale-[1.02] shadow-md">
                            Login to Book
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
            
            <!-- Salon Details -->
            <div class="w-full lg:w-2/3 p-8">
                <!-- Description -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About This Salon</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p>{{ $salon->description }}</p>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Services Offered</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach(explode(',', $salon->services) as $service)
                        <div class="bg-indigo-50 rounded-lg p-4 hover:bg-indigo-100 transition-colors">
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-2 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ trim($service) }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">Starting from $XX</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Owner Section -->
                @if($salon->owner_image && $salon->owner_bio)
                <div class="mb-10 bg-indigo-50 rounded-xl p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Meet the Owner</h2>
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-md flex-shrink-0">
                            <img src="{{ asset('storage/' . $salon->owner_image) }}" alt="{{ $salon->owner_name }}" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-xl font-medium text-gray-900">{{ $salon->owner_name }}</h3>
                            <p class="text-gray-600 mt-3">{{ $salon->owner_bio }}</p>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Gallery -->
                @if($salon->gallery && count($salon->gallery) > 0)
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Salon Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($salon->gallery as $image)
                        <div class="aspect-w-1 aspect-h-1 rounded-xl overflow-hidden bg-gray-100">
                            <img src="{{ $image }}" alt="Salon image" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Reviews Section -->
        <div class="border-t border-gray-200 px-8 py-10">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Customer Reviews</h2>
                
                @if($salon->reviews && count($salon->reviews) > 0)
                    <div class="space-y-8">
                        @foreach($salon->reviews as $review)
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 mr-4">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name) }}&background=indigo&color=white" alt="{{ $review->user->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $review->user->name }}</h4>
                                        <div class="flex mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="mt-4 text-gray-600">{{ $review->comment }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No reviews yet</h3>
                        <p class="mt-1 text-gray-500">Be the first to share your experience!</p>
                        @auth
                        <button class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Write a Review
                        </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection