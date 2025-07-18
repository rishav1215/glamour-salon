<!-- resources/views/components/header.blade.php -->
<header class="gradient-bg shadow-2xl relative">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="container mx-auto px-4 py-4 relative z-10">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <i class="fas fa-spa text-3xl text-pink-300 floating-animation"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-pink-400 rounded-full pulse-animation"></div>
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-white">Glamour Salon</h1>
                    <p class="text-pink-200 text-xs md:text-sm hidden md:block">Premium Beauty Experience</p>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-4 lg:space-x-6 xl:space-x-8">
                    <li><a href="{{route('salonsOwner.dashboard')}}" class="nav-link text-white hover:text-pink-200 font-medium transition duration-300 pb-1 text-sm lg:text-base">Dashboard</a></li>
                    <li><a href="{{ route('salonsOwner.appointment') }}" class="nav-link text-white hover:text-pink-200 font-medium transition duration-300 pb-1 text-sm lg:text-base">Appointments</a></li>
                    <li><a href="#" class="nav-link text-white hover:text-pink-200 font-medium transition duration-300 pb-1 text-sm lg:text-base">Services</a></li>
                    <li><a href="#" class="nav-link text-white hover:text-pink-200 font-medium transition duration-300 pb-1 text-sm lg:text-base">Staff</a></li>
                    <li><a href="#" class="nav-link text-white hover:text-pink-200 font-medium transition duration-300 pb-1 text-sm lg:text-base">Reports</a></li>
                </ul>
            </nav>

            <!-- User Info and Notifications -->
            <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                <!-- Notification Bell -->
                <div class="relative">
                    <button id="notification-bell" class="text-white text-xl lg:text-2xl relative focus:outline-none">
                        <i class="fas fa-bell"></i>
                        <span id="notification-counter" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden">0</span>
                    </button>

                    <!-- Notification Dropdown -->
                    <div id="notification-dropdown" class="absolute right-0 mt-2 w-72 lg:w-80 bg-white rounded-xl shadow-xl opacity-0 invisible transform scale-95 transition-all duration-200 z-20 max-h-96 overflow-y-auto">
                        <div class="p-4 border-b">
                            <h4 class="font-bold text-gray-800 text-sm lg:text-base">Notifications</h4>
                        </div>
                        <div id="notification-list" class="divide-y">
                            <div class="p-4 text-center text-gray-500 text-sm">No new notifications</div>
                        </div>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-menu-btn" class="flex items-center space-x-2 glass-effect px-3 lg:px-4 py-1 lg:py-2 rounded-full hover:bg-white hover:bg-opacity-20 transition duration-300 focus:outline-none">
                        <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-gradient-to-r from-pink-400 to-purple-400 flex items-center justify-center shadow-lg">
                            <i class="fas fa-user text-white text-xs lg:text-sm"></i>
                        </div>
                        <span class="text-white font-medium text-sm lg:text-base">{{ Auth::user()->name }}</span>
                        <i id="user-menu-arrow" class="fas fa-chevron-down text-white text-xs transition-transform duration-200"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-44 lg:w-48 bg-white rounded-xl shadow-xl opacity-0 invisible transform scale-95 transition-all duration-200 z-20">
                        <div class="p-2">
                            <a href="#" class="block px-3 lg:px-4 py-2 text-gray-700 hover:bg-gray-50 rounded-lg transition text-sm lg:text-base">
                                <i class="fas fa-user-circle mr-2"></i>Profile
                            </a>
                            <a href="#" class="block px-3 lg:px-4 py-2 text-gray-700 hover:bg-gray-50 rounded-lg transition text-sm lg:text-base">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2 px-3 lg:px-4 rounded-xl transition duration-300 flex items-center space-x-2 w-full text-left text-sm lg:text-base">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-gray-900 bg-opacity-90 z-50 transform -translate-x-full transition-transform duration-300 md:hidden">
        <div class="flex justify-end p-4">
            <button id="close-menu" class="text-white text-3xl focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex flex-col items-center justify-center h-full">
            <ul class="space-y-8 text-center">
                <li><a href="#" class="text-white text-2xl font-medium hover:text-pink-300 transition">Dashboard</a></li>
                <li><a href="{{ route('salonsOwner.appointment') }}" class="text-white text-2xl font-medium hover:text-pink-300 transition">Appointments</a></li>
                <li><a href="#" class="text-white text-2xl font-medium hover:text-pink-300 transition">Services</a></li>
                <li><a href="#" class="text-white text-2xl font-medium hover:text-pink-300 transition">Staff</a></li>
                <li><a href="#" class="text-white text-2xl font-medium hover:text-pink-300 transition">Reports</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="mt-8">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 flex items-center space-x-3 mx-auto">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Add this to your CSS or style section -->
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
    }
    
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }
    
    .floating-animation {
        animation: float 3s ease-in-out infinite;
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .nav-link {
        position: relative;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #f472b6;
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
        width: 100%;
    }
</style>

<script>
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenuBtn = document.getElementById('close-menu');
    
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
        document.body.style.overflow = 'hidden';
    });
    
    closeMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        document.body.style.overflow = 'auto';
    });
    
    // User dropdown functionality
    const userMenuBtn = document.getElementById('user-menu-btn');
    const userDropdown = document.getElementById('user-dropdown');
    const userMenuArrow = document.getElementById('user-menu-arrow');
    
    userMenuBtn.addEventListener('click', () => {
        const isOpen = !userDropdown.classList.contains('opacity-0');
        
        if (isOpen) {
            userDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            userMenuArrow.classList.remove('rotate-180');
        } else {
            userDropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
            userMenuArrow.classList.add('rotate-180');
        }
    });
    
    // Notification dropdown functionality
    const notificationBell = document.getElementById('notification-bell');
    const notificationDropdown = document.getElementById('notification-dropdown');
    
    notificationBell.addEventListener('click', () => {
        const isOpen = !notificationDropdown.classList.contains('opacity-0');
        
        if (isOpen) {
            notificationDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
        } else {
            notificationDropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
        }
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
            userDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            userMenuArrow.classList.remove('rotate-180');
        }
        
        if (!notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
        }
    });
</script>