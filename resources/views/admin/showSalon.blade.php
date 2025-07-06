<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Details - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Include your admin sidebar here if needed -->
        
        <div class="ml-0 md:ml-64 p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Header with back button -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-store-alt text-indigo-600 mr-2"></i>Salon Details
                    </h1>
                    <a href="{{route('admin.manageSalon')}}" class="text-indigo-600 hover:text-indigo-800">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>

                <!-- Salon Details Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Salon Header -->
                    <div class="bg-indigo-700 p-6 text-white">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-full mr-4">
                                <i class="fas fa-store text-2xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">{{ $salonOwner->salon_name }}</h2>
                                <p class="text-indigo-100">{{ $salonOwner->city }}, {{ $salonOwner->state }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Details Content -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Owner Information -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">
                                    <i class="fas fa-user-tie text-indigo-600 mr-2"></i>Owner Information
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-500">Full Name</p>
                                        <p class="font-medium">{{ $salonOwner->owner_name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Email Address</p>
                                        <p class="font-medium">{{ $salonOwner->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Salon Information -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">
                                    <i class="fas fa-info-circle text-indigo-600 mr-2"></i>Salon Information
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-500">Salon Name</p>
                                        <p class="font-medium">{{ $salonOwner->name }}</p>
                                    </div>
                                      <div>
                                        <p class="text-sm text-gray-500">Address</p>
                                        <p class="font-medium">{{ $salonOwner->address }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Location</p>
                                        <p class="font-medium">{{ $salonOwner->city }}, {{ $salonOwner->state }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Status</p>
                                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                                            {{ $salonOwner->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $salonOwner->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $salonOwner->status === 'inactive' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst($salonOwner->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
                        <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-print mr-2"></i>Print
                        </button>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            <i class="fas fa-edit mr-2"></i>Edit Details
                        </button>
                    </div>
                </div>

                <!-- Additional Information Section (optional) -->
                <div class="mt-6 bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-chart-line text-indigo-600 mr-2"></i>Additional Information
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div class="p-3 bg-indigo-50 rounded-lg">
                            <p class="text-sm text-indigo-600">Services Offered</p>
                            <p class="font-bold text-indigo-800">12</p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg">
                            <p class="text-sm text-green-600">Staff Members</p>
                            <p class="font-bold text-green-800">5</p>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-lg">
                            <p class="text-sm text-purple-600">Monthly Appointments</p>
                            <p class="font-bold text-purple-800">86</p>
                        </div>
                        <div class="p-3 bg-yellow-50 rounded-lg">
                            <p class="text-sm text-yellow-600">Registered Since</p>
                            <p class="font-bold text-yellow-800">Jan 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>