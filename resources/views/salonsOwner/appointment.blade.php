<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Owner Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .gradient-card {
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
        }
        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            background-color: #EEF2FF;
        }
        .status-badge {
            transition: all 0.2s ease;
        }
        .action-btn {
            transition: all 0.2s ease;
        }
        tr:hover {
            background-color: #f8fafc;
        }
        
        /* Responsive table styles */
        @media (max-width: 768px) {
            .responsive-table thead {
                display: none;
            }
            .responsive-table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
            }
            .responsive-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem;
                border-bottom: 1px solid #e5e7eb;
            }
            .responsive-table td:before {
                content: attr(data-label);
                font-weight: 500;
                color: #6b7280;
                margin-right: 1rem;
            }
            .responsive-table td:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header would be included here -->
        @include('salonsOwner.header')
        
        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <!-- Success Message -->
            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <!-- Welcome Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Welcome back, {{ auth()->user()->name }}</h1>
                    <p class="text-gray-600 mt-1">Here's your salon overview for today</p>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full shadow-sm">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>

            <!-- Salon Information Card -->
            <div class="gradient-card p-6 rounded-xl shadow-lg mb-8 text-white transform transition hover:shadow-xl">
                <div class="flex flex-col md:flex-row justify-between items-start">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-semibold mb-2 opacity-90">YOUR SALON</h3>
                        <h2 class="text-2xl font-bold mb-3">{{ $salon->name }}</h2>
                        <div class="flex items-center mb-2 opacity-90">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <p>{{ $salon->location }}</p>
                        </div>
                        <div class="flex items-center opacity-90">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p>{{ $salon->services }}</p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full self-center">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Appointments Section -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 sm:mb-0">Upcoming Appointments</h3>
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">
                        {{ $bookings->count() }} {{ Str::plural('appointment', $bookings->count()) }}
                    </span>
                </div>

                @if($bookings->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 responsive-table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($bookings as $booking)
                                <tr class="transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Client">
                                        <div class="flex items-center">
                                            <div class="avatar h-10 w-10 rounded-full">
                                                {{ substr($booking->name, 0, 1) }}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $booking->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" data-label="Contact">
                                        {{ $booking->contact }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" data-label="Email">
                                        {{ $booking->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Time">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ \Carbon\Carbon::parse($booking->appointment_time)->format('d M Y') }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($booking->appointment_time)->format('h:i A') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Status">
                                        <span class="status-badge px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $booking->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($booking->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" data-label="Action">
                                        @if($booking->status !== 'approved')
                                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="action-btn text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md text-sm font-medium">
                                                    Approve
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-green-600">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="h-12 w-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <h4 class="mt-4 text-lg font-medium text-gray-700">No appointments scheduled</h4>
                        <p class="mt-1 text-gray-500">When you have upcoming appointments, they'll appear here.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>