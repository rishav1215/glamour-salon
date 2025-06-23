@extends('layouts.header')

@section('content')
@if(session('error'))
    <div class="text-red-600 mb-4">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="text-green-600 mb-4">{{ session('success') }}</div>
@endif

<div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10 mb-10">
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">Register Your Salon</h2>
    <p class="text-gray-600 mb-8 text-center">Fill in the details below to list your salon on our platform</p>

    <form action="{{ route('salon.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Salon Basic Information -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Salon Name *</label>
                    <input type="text" name="name" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Contact Number *</label>
                    <input type="tel" name="contact_number" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('contact_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Description *</label>
                <textarea name="description" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                          placeholder="Tell us about your salon, specialties, etc."></textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Owner Information -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Owner Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Owner Name *</label>
                    <input type="text" name="owner_name" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('owner_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Owner Email *</label>
                    <input type="email" name="owner_email" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('owner_email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Owner Image *</label>
                <input type="file" name="owner_image" accept="image/*" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <p class="text-gray-500 text-sm mt-1">Upload a professional photo of the salon owner</p>
                @error('owner_image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Owner Bio</label>
                <textarea name="owner_bio" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                          placeholder="Tell us about the owner's experience and qualifications"></textarea>
                <p class="text-gray-500 text-sm mt-1">This will help build trust with potential clients</p>
            </div>
        </div>

        <!-- Salon Images -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Salon Images</h3>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Main Image *</label>
                <input type="file" name="image" accept="image/*" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <p class="text-gray-500 text-sm mt-1">This will be the primary image displayed for your salon</p>
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Additional Images (Max 5)</label>
                <input type="file" name="gallery[]" accept="image/*" multiple 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <p class="text-gray-500 text-sm mt-1">Upload multiple images to showcase your salon</p>
            </div> --}}
        </div>

        <!-- Location Information -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Location Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Address *</label>
                    <input type="text" name="address" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">City *</label>
                    <input type="text" name="city" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('city')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">State/Province *</label>
                    <input type="text" name="state" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('state')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Postal Code *</label>
                    <input type="text" name="postal_code" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    @error('postal_code')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Country *</label>
                    <select name="country" required 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                        <option value="">Select Country</option>
                        <option value="india">india</option>
                        <option value="UK">United Kingdom</option>
                        <option value="CA">Canada</option>
                        <!-- Add more countries as needed -->
                    </select>
                    @error('country')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Services Information -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Services Offered</h3>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Services *</label>
                <textarea name="services" rows="3" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                          placeholder="Haircut, Coloring, Manicure, Pedicure, etc. (comma separated)"></textarea>
                <p class="text-gray-500 text-sm mt-1">List all services you offer, separated by commas</p>
                @error('services')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Specializations</label>
                <input type="text" name="specializations" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                       placeholder="e.g. Bridal Hair, Keratin Treatments">
                <p class="text-gray-500 text-sm mt-1">List any special services or areas of expertise</p>
            </div>
        </div>

        <!-- Business Information -->
        <div class="bg-indigo-50 p-4 rounded-lg">
            <h3 class="text-xl font-semibold text-indigo-800 mb-4">Business Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Opening Hours *</label>
                    <input type="text" name="opening_hours" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                           placeholder="e.g. 9:00 AM - 7:00 PM">
                    @error('opening_hours')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Years in Business</label>
                    <input type="number" name="years_in_business" min="0" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Number of Stylists</label>
                    <input type="number" name="number_of_stylists" min="1" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Accept Credit Cards?</label>
                    <select name="accepts_credit_cards" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Terms and Submission -->
        {{-- <div class="mb-6">
            <div class="flex items-center">
                <input type="checkbox" name="terms" id="terms" required 
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Terms and Conditions</a> *
                </label>
            </div>
            @error('terms')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="flex justify-center">
            <button type="submit" id="payment"
                    class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 font-medium text-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Submit and Continue to Payment
            </button>
        </div>
    </form>
</div>
@endsection