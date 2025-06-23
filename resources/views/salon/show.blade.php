@extends('layouts.header')

@section('content')
@if(session('error'))
    <div class="text-red-600 mb-4">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="text-green-600 mb-4">{{ session('success') }}</div>
@endif

<div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10 mb-10">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Salon Image -->
        <div class="w-full md:w-1/3">
            <div class="bg-gray-100 rounded-lg overflow-hidden aspect-square">
                <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}" class="w-full h-full object-cover">
            </div>
        </div>
        
        <!-- Salon Details -->
        <div class="w-full md:w-2/3">
            <h1 class="text-3xl font-bold text-indigo-700 mb-2">{{ $salon->name }}</h1>
            
            <!-- Rating -->
            <div class="flex items-center mb-4">
                <div class="flex text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($salon->average_rating))
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        @endif
                    @endfor
                </div>
                <span class="ml-2 text-gray-600">{{ $salon->average_rating ? number_format($salon->average_rating, 1) : 'No ratings' }} ({{ $salon->reviews_count }} reviews)</span>
            </div>
            
            <p class="text-gray-700 mb-6">{{ $salon->description }}</p>
            
            <div class="bg-indigo-50 p-4 rounded-lg mb-6">
                <h3 class="text-xl font-semibold text-indigo-800 mb-3">Contact Information</h3>
                <div class="space-y-2">
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $salon->address }}, {{ $salon->city }}, {{ $salon->state }} {{ $salon->postal_code }}
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        {{ $salon->contact_number }}
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Open: {{ $salon->opening_hours }}
                    </p>
                </div>
            </div>
            
            <!-- Services -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-indigo-800 mb-3">Services Offered</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $salon->services) as $service)
                        <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">{{ trim($service) }}</span>
                    @endforeach
                </div>
            </div>
            
            @auth
                <div class="flex justify-center md:justify-start">
                    <a href="{{ route('bookings.create', $salon->id) }}"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 font-medium text-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Book Appointment
                    </a>
                </div>
            @endauth
        </div>
    </div>
    
    <!-- Owner Section -->
    @if($salon->owner_image && $salon->owner_bio)
    <div class="mt-10 bg-indigo-50 p-6 rounded-lg">
        <h3 class="text-xl font-semibold text-indigo-800 mb-4">About the Owner</h3>
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-md">
                <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}" alt="{{ $salon->owner_name }}" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <h4 class="text-lg font-medium text-gray-800">{{ $salon->owner_name }}</h4>
                <p class="text-gray-600 mt-2">{{ $salon->owner_bio }}</p>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Gallery -->
    @if($salon->gallery && count($salon->gallery) > 0)
    <div class="mt-10">
        <h3 class="text-xl font-semibold text-indigo-800 mb-4">Salon Gallery</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($salon->gallery as $image)
                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                    <img src="{{ $image }}" alt="Salon image" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>
    </div>
    @endif
    
    <!-- Reviews Section -->
    <div class="mt-10">
        <h3 class="text-xl font-semibold text-indigo-800 mb-6">Customer Reviews</h3>
        
        @if($salon->reviews && count($salon->reviews) > 0)
            <div class="space-y-6">
                @foreach($salon->reviews as $review)
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $review->user->name }}</h4>
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
                            <span class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                        </div>
                        <p class="mt-3 text-gray-600">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 bg-gray-50 rounded-lg">
                <p class="text-gray-500">No reviews yet. Be the first to review!</p>
            </div>
        @endif
    </div>
</div>
@endsection