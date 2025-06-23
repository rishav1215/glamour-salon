<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - All Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
        
        /* Mobile menu animation */
        .sidebar-mobile {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .sidebar-mobile.open {
            transform: translateX(0);
        }
        
        @media (min-width: 768px) {
            .sidebar-mobile {
                transform: translateX(0);
            }
        }
        
        /* Prevent scrolling when mobile menu is open */
        body.menu-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50" :class="{ 'menu-open': mobileMenuOpen }">
    <!-- Mobile Menu Button -->
    <div class="md:hidden fixed top-4 left-4 z-20">
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md bg-white shadow-md text-gray-600">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div x-data="{ mobileMenuOpen: false }" class="flex min-h-screen">
        {{-- Sidebar --}}
        <div class="sidebar-mobile w-64 bg-white shadow-md fixed h-full z-10" :class="{ 'open': mobileMenuOpen }">
            @include('admin.sidebar')
        </div>

        {{-- Overlay for mobile --}}
        <div @click="mobileMenuOpen = false" 
             class="fixed inset-0 bg-black bg-opacity-50 z-10 md:hidden" 
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
        </div>

        {{-- Main Content --}}
        <div class="flex-1 md:ml-64 p-4 sm:p-6 lg:p-8 transition-all duration-300">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">User Management</h1>
                    <p class="text-sm sm:text-base text-gray-600">View and manage all registered users</p>
                </div>
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Search users..." class="w-full pl-10 pr-4 py-2 text-sm sm:text-base border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            {{-- Session Flash --}}
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <p class="text-sm sm:text-base text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Users Table --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Email</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider hidden xs:table-cell">Status</th>
                                <th class="px-4 sm:px-6 py-3 text-right text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <span class="text-indigo-600 text-sm sm:text-base font-medium">{{ substr($user->name, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-3 sm:ml-4">
                                            <div class="text-sm sm:text-base font-medium text-gray-900">{{ $user->name }}</div>
                                            <div class="text-xs sm:text-sm text-gray-500 sm:hidden">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap hidden xs:table-cell">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2 sm:space-x-3">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                                <i class="fas fa-trash-alt text-sm sm:text-base"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                            <i class="fas fa-edit text-sm sm:text-base"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Footer --}}
                <div class="bg-gray-50 px-4 sm:px-6 py-3 flex flex-col sm:flex-row items-center justify-between border-t border-gray-200">
                    @if(method_exists($users, 'links'))
                        <div class="mb-2 sm:mb-0 text-xs sm:text-sm text-gray-700">
                            Showing <span class="font-medium">{{ $users->firstItem() }}</span> to 
                            <span class="font-medium">{{ $users->lastItem() }}</span> of 
                            <span class="font-medium">{{ $users->total() }}</span> results
                        </div>
                        <div class="flex space-x-1">
                            <a href="{{ $users->previousPageUrl() }}" 
                               class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 {{ $users->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                <i class="fas fa-chevron-left text-xs sm:text-sm"></i>
                            </a>
                            @foreach(range(1, $users->lastPage()) as $page)
                                <a href="{{ $users->url($page) }}" 
                                   class="px-2 sm:px-3 py-1 border rounded text-xs sm:text-sm {{ $users->currentPage() === $page ? 'text-indigo-600 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
                                    {{ $page }}
                                </a>
                            @endforeach
                            <a href="{{ $users->nextPageUrl() }}" 
                               class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 {{ !$users->hasMorePages() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                <i class="fas fa-chevron-right text-xs sm:text-sm"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-xs sm:text-sm text-gray-700">
                            Showing all {{ count($users) }} results
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar-mobile');
            const menuBtn = document.querySelector('[x-on\\:click]');
            
            if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
                Alpine.store('mobileMenuOpen', false);
            }
        });
        
        // Close menu when resizing to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                Alpine.store('mobileMenuOpen', false);
            }
        });
    </script>
</body>
</html>