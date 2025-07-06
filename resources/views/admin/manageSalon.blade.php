<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Salon Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50">
    @auth
    @if(auth()->user()->role === 'admin')
    
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <div class="container mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-800">Salon Management Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-user-shield mr-2"></i>Admin
                    </span>
                    <span class="text-gray-600">
                        {{ now()->format('l, F j, Y') }}
                    </span>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-blue-500">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500">Total Salons</p>
                            <h3 class="text-2xl font-bold">42</h3>
                            <p class="text-xs text-gray-500 mt-1">+3 this week</p>
                        </div>
                        <i class="fas fa-store text-blue-500 text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500">Active Salons</p>
                            <h3 class="text-2xl font-bold">38</h3>
                            <p class="text-xs text-gray-500 mt-1">92% active rate</p>
                        </div>
                        <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-purple-500">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500">New Registrations</p>
                            <h3 class="text-2xl font-bold">5</h3>
                            <p class="text-xs text-gray-500 mt-1">Pending approval</p>
                        </div>
                        <i class="fas fa-user-plus text-purple-500 text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-yellow-500">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500">Platform Revenue</p>
                            <h3 class="text-2xl font-bold">₹1,24,500</h3>
                            <p class="text-xs text-gray-500 mt-1">This month</p>
                        </div>
                        <i class="fas fa-rupee-sign text-yellow-500 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Quick Actions</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center">
                        <i class="fas fa-store-alt text-blue-500 text-3xl mb-2"></i>
                        <span>Add New Salon</span>
                    </a>
                    <a href="#" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center">
                        <i class="fas fa-clipboard-list text-green-500 text-3xl mb-2"></i>
                        <span>View Applications</span>
                    </a>
                    <a href="#" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center">
                        <i class="fas fa-envelope text-purple-500 text-3xl mb-2"></i>
                        <span>Send Notifications</span>
                    </a>
                    <a href="#" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center">
                        <i class="fas fa-file-invoice-dollar text-yellow-500 text-3xl mb-2"></i>
                        <span>Generate Reports</span>
                    </a>
                </div>
            </div>

            <!-- Recent Salon Registrations -->
            <div class="bg-white rounded-xl shadow overflow-hidden mb-8">
                <div class="p-6 border-b flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-700">Recent Salon Registrations</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm">View All Salons</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Salon Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registration Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                     <tbody class="divide-y divide-gray-200">
    @foreach($salonOwners as $owner)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <i class="fas fa-store text-indigo-600"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $owner->salon->name ?? 'Salon Name' }}</div>
                        <div class="text-sm text-gray-500">ID: {{ $owner->id }}</div>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $owner->salon->owner_name ?? 'rishav' }}</div>
                <div class="text-sm text-gray-500">{{ $owner->email }}</div>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $owner->salon->city ?? '-' }}</div>
                <div class="text-sm text-gray-500">{{ $owner->state ?? '-' }}</div>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
                @if($owner->status === 'active')
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                @elseif($owner->status === 'pending')
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Pending
                    </span>
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Inactive
                    </span>
                @endif
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $owner->created_at->format('d M Y') }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('admin.showSalon', $owner->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.editSalon', $owner->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.blockSalon', $owner->id) }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="text-red-600 hover:text-red-900">
        <i class="fas fa-ban"></i>
    </button>
</form>
            </td>
        </tr>
    @endforeach
</tbody>

                    </table>
                </div>
            </div>

            <!-- Salon Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Salon Registrations</h2>
                    <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center">
                        <!-- Placeholder for chart - Replace with actual chart -->
                        <p class="text-gray-400">Monthly registration chart will appear here</p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Salon Distribution</h2>
                    <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center">
                        <!-- Placeholder for map - Replace with actual map -->
                        <p class="text-gray-400">Geographical distribution map will appear here</p>
                    </div>
                </div>
            </div>

            <!-- Platform Settings -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Platform Settings</h2>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Commission Rate</label>
                            <div class="relative">
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md pr-8" value="15">
                                <span class="absolute right-3 top-2 text-gray-500">%</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Auto-approval Threshold</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                <option>Manual approval required</option>
                                <option>Auto-approve after verification</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Announcement</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md h-24">New feature update coming next week! All salons will receive a notification.</textarea>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 mr-3">Cancel</button>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @else
    <!-- Access Denied for non-admins -->
    <div class="flex items-center justify-center h-screen bg-gray-50">
        <div class="text-center p-8 bg-white rounded-xl shadow-md max-w-md">
            <i class="fas fa-exclamation-triangle text-5xl text-yellow-500 mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Access Restricted</h2>
            <p class="text-gray-600 mb-6">Administrator privileges required to access this dashboard.</p>
            <a href="{{ url('/dashboard') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 inline-block">Return to Dashboard</a>
        </div>
    </div>
    @endif
    @endauth
</body>
</html>