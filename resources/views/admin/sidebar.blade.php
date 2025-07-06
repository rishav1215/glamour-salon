<div class="fixed left-0 top-0 w-64 h-full bg-gradient-to-b from-gray-800 to-gray-900 shadow-2xl z-40 transform transition-all duration-300 ease-in-out"
    id="sidebar">
    <!-- Close Button (Mobile) -->
    <button class="md:hidden absolute right-4 top-4 text-gray-400 hover:text-white transition-colors">
        <i class="fas fa-times text-xl"></i>
    </button>

    <div class="p-6 h-full flex flex-col">
        <!-- Logo -->
        <div class="flex items-center space-x-3 mb-8">
            <div
                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg animate-float">
                <i class="fas fa-crown text-white text-xl"></i>
            </div>
            <div>
                <h2 class="text-white text-xl font-bold">Admin Panel</h2>
                <p class="text-blue-300 text-sm">Salon Management</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-blue-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-tachometer-alt text-blue-400"></i>
                </div>
                <span class="font-medium">Dashboard</span>
                <span class="ml-auto bg-blue-500 text-xs text-white px-2 py-1 rounded-full">New</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-users text-green-400"></i>
                </div>
                <span class="font-medium">Manage Users</span>
            </a>

            <a href="{{route('admin.manageSalon')}}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-spa text-purple-400"></i>
                </div>
                <span class="font-medium">Manage Salons</span>
                <span class="ml-auto bg-purple-500 text-xs text-white px-2 py-1 rounded-full">5</span>
            </a>

            <a href="{{ route('admin.appointments.index') }}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-pink-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-calendar-alt text-pink-400"></i>
                </div>
                <span class="font-medium">Appointments</span>
            </a>


            <hr class="border-gray-700 my-4">

            <a href="{{route('admin.analytics')}}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-yellow-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-chart-bar text-yellow-400"></i>
                </div>
                <span class="font-medium">Analytics</span>
            </a>

            <a href="{{route('admin.setting')}}"
                class="admin-nav-item flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200 group">
                <div
                    class="w-9 h-9 bg-indigo-500 bg-opacity-20 rounded-lg flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <i class="fas fa-cog text-indigo-400"></i>
                </div>
                <span class="font-medium">Settings</span>
            </a>
        </nav>

        <!-- Admin Profile -->
        <div class="mt-auto">
            <div
                class="bg-gray-700 bg-opacity-50 backdrop-blur-sm p-4 rounded-xl border border-gray-600 border-opacity-30">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center animate-pulse">
                        <i class="fas fa-user-shield text-white text-sm"></i>
                    </div>
                    <div x-data="{ open: false }" class="relative flex-1">
                        <!-- Trigger Button -->
                        <button @click="open = !open" class="flex flex-col text-left focus:outline-none w-full"
                            aria-haspopup="true" :aria-expanded="open">
                            <p class="text-white font-medium text-sm truncate">{{ Auth::user()->name }}</p>
                            <p class="text-blue-300 text-xs truncate">{{ Auth::user()->email }}</p>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.away="open = false"
                            class="absolute right-0 bottom-full mb-2 w-48 bg-gray-800 rounded-lg shadow-xl py-1 z-50 border border-gray-700">
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 transition">
                                <i class="fas fa-user-circle mr-2"></i>Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-700 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    #sidebar {
        scrollbar-width: thin;
        scrollbar-color: #4b5563 #1f2937;
    }

    #sidebar::-webkit-scrollbar {
        width: 4px;
    }

    #sidebar::-webkit-scrollbar-track {
        background: #1f2937;
    }

    #sidebar::-webkit-scrollbar-thumb {
        background-color: #4b5563;
        border-radius: 4px;
    }
</style>