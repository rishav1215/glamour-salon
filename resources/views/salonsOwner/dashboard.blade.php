<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ec4899, #f59e0b);
            transition: width 0.3s ease;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .animate-ping {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) 1;
        }
        
        @keyframes ping {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .mobile-text-sm {
                font-size: 0.875rem;
            }
            
            .mobile-p-3 {
                padding: 0.75rem;
            }
            
            .mobile-stack {
                flex-direction: column;
            }
            
            .mobile-w-full {
                width: 100%;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .tablet-text-md {
                font-size: 1rem;
            }
            
            .tablet-flex-col {
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed top-0 left-0 w-64 h-full bg-white shadow-xl z-50 md:hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-spa text-2xl text-pink-500"></i>
                    <h2 class="text-xl font-bold text-gray-800">Glamour</h2>
                </div>
                <button id="close-menu" class="text-gray-500 text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <li>
                <a href="" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition flex justify-between items-center">
                    <span>Notifications</span>
                    <span id="mobile-notification-counter" class="bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden">0</span>
                </a>
            </li>
            <nav>
                <ul class="space-y-4">
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Dashboard</a></li>
                    <li><a href="{{route('salonsOwner.appointment')}}" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Appointments</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Clients</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Services</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Staff</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-lg transition">Reports</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Header Section -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button id="mobile-menu-btn" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <i class="fas fa-spa text-2xl text-pink-200"></i>
                    <h1 class="text-xl font-bold">Glamour Salon</h1>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="nav-link text-white hover:text-pink-200 transition">Dashboard</a>
                    <a href="{{route('salonsOwner.appointment')}}" class="nav-link text-white hover:text-pink-200 transition">Appointments</a>
                    <a href="#" class="nav-link text-white hover:text-pink-200 transition">Clients</a>
                    <a href="#" class="nav-link text-white hover:text-pink-200 transition">Services</a>
                    <a href="#" class="nav-link text-white hover:text-pink-200 transition">Staff</a>
                </nav>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Notification Bell -->
                    <div class="relative">
                        <button id="notification-bell" class="text-white hover:text-pink-200 focus:outline-none relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notification-counter" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden">0</span>
                        </button>
                        
                        <!-- Notification Dropdown -->
                        <div id="notification-dropdown" class="absolute right-0 mt-2 w-72 md:w-80 bg-white rounded-lg shadow-xl z-50 opacity-0 invisible scale-95 transition-all duration-300 transform origin-top-right">
                            <div class="p-4 border-b border-gray-200">
                                <h3 class="font-medium text-gray-800">Notifications</h3>
                            </div>
                            <div id="notification-list" class="max-h-60 overflow-y-auto">
                                <p class="p-4 text-gray-500 text-center">No new notifications</p>
                            </div>
                            <div class="p-2 border-t border-gray-200 text-center">
                                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View all</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="relative">
                        <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-pink-500 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="text-white hidden md:inline">Admin</span>
                            <i id="user-menu-arrow" class="fas fa-chevron-down text-xs text-white transition-transform"></i>
                        </button>
                        
                        <!-- User Dropdown -->
                        <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 opacity-0 invisible scale-95 transition-all duration-300 transform origin-top-right">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 md:px-6 py-8 md:py-12">
        <div class="text-center mb-8 md:mb-16">
            <div class="inline-block">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-4 md:mb-6">
                    Welcome to Salon Management
                </h1>
                <div class="w-16 md:w-24 h-1 bg-gradient-to-r from-pink-500 to-purple-500 mx-auto mb-4 md:mb-6 rounded-full"></div>
            </div>
            <p class="text-base md:text-lg lg:text-xl text-gray-600 mb-8 md:mb-12 max-w-3xl mx-auto leading-relaxed">
                Transform your salon business with our comprehensive management system. Streamline appointments, manage
                clients, and boost your revenue with elegant simplicity.
            </p>
        </div>

        <!-- Quick Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 mb-8 md:mb-12 lg:mb-16">
            <div class="card-hover bg-white p-4 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-md md:shadow-lg border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 md:w-20 h-16 md:h-20 bg-gradient-to-br from-pink-100 to-pink-200 rounded-bl-full"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm md:text-base text-gray-500 font-medium mb-2">Today's Appointments</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">24</h3>
                        <p class="text-green-600 text-xs md:text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+12% from yesterday
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-400 to-pink-600 p-3 md:p-4 rounded-xl md:rounded-2xl shadow-md md:shadow-lg">
                        <i class="fas fa-calendar-check text-xl md:text-2xl text-white"></i>
                    </div>
                </div>
            </div>

            <div class="card-hover bg-white p-4 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-md md:shadow-lg border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 md:w-20 h-16 md:h-20 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-bl-full"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm md:text-base text-gray-500 font-medium mb-2">New Clients</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">8</h3>
                        <p class="text-blue-600 text-xs md:text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+5% from last week
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-400 to-indigo-600 p-3 md:p-4 rounded-xl md:rounded-2xl shadow-md md:shadow-lg">
                        <i class="fas fa-user-plus text-xl md:text-2xl text-white"></i>
                    </div>
                </div>
            </div>

            <div class="card-hover bg-white p-4 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-md md:shadow-lg border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 md:w-20 h-16 md:h-20 bg-gradient-to-br from-purple-100 to-purple-200 rounded-bl-full"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm md:text-base text-gray-500 font-medium mb-2">Revenue Today</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">$1,245</h3>
                        <p class="text-purple-600 text-xs md:text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+8% from yesterday
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-400 to-purple-600 p-3 md:p-4 rounded-xl md:rounded-2xl shadow-md md:shadow-lg">
                        <i class="fas fa-dollar-sign text-xl md:text-2xl text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-md md:shadow-lg p-4 md:p-6 lg:p-8 mb-8 md:mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 md:mb-6 text-center">Quick Actions</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4">
                <button class="p-3 sm:p-4 md:p-6 bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg md:rounded-xl hover:from-pink-100 hover:to-pink-200 transition duration-300 group">
                    <i class="fas fa-plus text-xl md:text-2xl text-pink-600 mb-2 md:mb-3 group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm md:text-base text-gray-700 font-medium">New Appointment</p>
                </button>
                <button class="p-3 sm:p-4 md:p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg md:rounded-xl hover:from-blue-100 hover:to-blue-200 transition duration-300 group">
                    <i class="fas fa-user-plus text-xl md:text-2xl text-blue-600 mb-2 md:mb-3 group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm md:text-base text-gray-700 font-medium">Add Client</p>
                </button>
                <button class="p-3 sm:p-4 md:p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-lg md:rounded-xl hover:from-green-100 hover:to-green-200 transition duration-300 group">
                    <i class="fas fa-cut text-xl md:text-2xl text-green-600 mb-2 md:mb-3 group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm md:text-base text-gray-700 font-medium">New Service</p>
                </button>
                <button class="p-3 sm:p-4 md:p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg md:rounded-xl hover:from-purple-100 hover:to-purple-200 transition duration-300 group">
                    <i class="fas fa-chart-bar text-xl md:text-2xl text-purple-600 mb-2 md:mb-3 group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm md:text-base text-gray-700 font-medium">View Reports</p>
                </button>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center">
            <form action="#" method="POST">
                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 px-6 md:py-4 md:px-8 rounded-lg md:rounded-xl transition duration-300 flex items-center space-x-2 mx-auto shadow-md hover:shadow-lg transform hover:scale-105">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 md:py-12 mt-8 md:mt-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6 md:mb-8">
                <div class="flex items-center justify-center space-x-2 md:space-x-3 mb-2 md:mb-4">
                    <i class="fas fa-spa text-xl md:text-2xl text-pink-400"></i>
                    <h3 class="text-xl md:text-2xl font-bold">Glamour Salon</h3>
                </div>
                <p class="text-sm md:text-base text-gray-400">Premium Beauty Experience</p>
            </div>

            <div class="flex justify-center space-x-4 md:space-x-6 mb-6 md:mb-8">
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300 group">
                    <i class="fab fa-facebook-f text-sm md:text-base lg:text-lg group-hover:text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300 group">
                    <i class="fab fa-instagram text-sm md:text-base lg:text-lg group-hover:text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300 group">
                    <i class="fab fa-twitter text-sm md:text-base lg:text-lg group-hover:text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300 group">
                    <i class="fab fa-linkedin-in text-sm md:text-base lg:text-lg group-hover:text-white"></i>
                </a>
            </div>

            <div class="text-center text-gray-400 border-t border-gray-800 pt-6 md:pt-8">
                <p class="text-sm md:text-base">&copy; 2024 Salon Management System. All rights reserved.</p>
                <p class="text-xs md:text-sm mt-2">Made with <i class="fas fa-heart text-pink-500"></i> for beautiful salons everywhere</p>
            </div>
        </div>
    </footer>

    <!-- Notification Sound -->
    <audio id="notification-sound" preload="auto">
        <source src="https://assets.mixkit.co/sfx/preview/mixkit-alarm-digital-clock-beep-989.mp3" type="audio/mpeg">
    </audio>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMenuBtn = document.getElementById('close-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            mobileMenuOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        closeMenuBtn.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // User dropdown functionality
        const userMenuBtn = document.getElementById('user-menu-btn');
        const userDropdown = document.getElementById('user-dropdown');
        const userMenuArrow = document.getElementById('user-menu-arrow');

        userMenuBtn.addEventListener('click', () => {
            const isVisible = !userDropdown.classList.contains('opacity-0');

            if (isVisible) {
                userDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
                userMenuArrow.classList.remove('rotate-180');
            } else {
                userDropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
                userMenuArrow.classList.add('rotate-180');
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
                userMenuArrow.classList.remove('rotate-180');
            }
        });

        // Notification system
        const notificationBell = document.getElementById('notification-bell');
        if (notificationBell) {
            notificationBell.addEventListener('click', function() {
                const dropdown = document.getElementById('notification-dropdown');
                if (dropdown) {
                    const isVisible = !dropdown.classList.contains('opacity-0');
                    if (isVisible) {
                        dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
                    } else {
                        dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
                        const counter = document.getElementById('notification-counter');
                        const mobileCounter = document.getElementById('mobile-notification-counter');
                        if (counter) counter.classList.add('hidden');
                        if (mobileCounter) mobileCounter.classList.add('hidden');
                    }
                }
            });
        }

        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe cards for animation
        document.querySelectorAll('.card-hover').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Add loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
        });

        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.5s ease';

        // Simulate Pusher notifications for demo
        function simulateNotification() {
            const sound = document.getElementById('notification-sound');
            if (sound) {
                sound.play().catch(e => console.log('Sound play failed:', e));
            }

            const counter = document.getElementById('notification-counter');
            const mobileCounter = document.getElementById('mobile-notification-counter');
            if (counter && mobileCounter) {
                let count = parseInt(counter.textContent || '0') + 1;
                counter.textContent = count;
                mobileCounter.textContent = count;
                counter.classList.remove('hidden');
                mobileCounter.classList.remove('hidden');
            }

            const notificationList = document.getElementById('notification-list');
            if (notificationList) {
                const notificationItem = document.createElement('div');
                notificationItem.className = 'p-4 hover:bg-gray-50 cursor-pointer';
                notificationItem.innerHTML = `
                    <div class="flex items-start">
                        <div class="bg-pink-100 p-2 rounded-full mr-3">
                            <i class="fas fa-calendar-check text-pink-500"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">New Appointment</p>
                            <p class="text-sm text-gray-500">Demo Client - ${new Date().toLocaleString()}</p>
                            <p class="text-xs text-gray-400 mt-1">Just now</p>
                        </div>
                    </div>
                `;
                if (notificationList.firstChild && notificationList.firstChild.textContent.includes('No new notifications')) {
                    notificationList.innerHTML = '';
                }
                notificationList.prepend(notificationItem);
            }

            const bell = document.getElementById('notification-bell');
            if (bell) {
                bell.classList.add('animate-ping');
                setTimeout(() => {
                    bell.classList.remove('animate-ping');
                }, 1000);
            }

            // Mobile notification
            if (window.innerWidth < 768) {
                const mobileNotification = document.createElement('div');
                mobileNotification.className = 'fixed bottom-4 left-4 right-4 bg-white p-4 rounded-lg shadow-lg z-50 border border-gray-200';
                mobileNotification.innerHTML = `
                    <div class="flex items-start">
                        <div class="bg-pink-100 p-2 rounded-full mr-3">
                            <i class="fas fa-calendar-check text-pink-500"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">New Appointment</p>
                            <p class="text-sm text-gray-500">Demo Client</p>
                            <p class="text-xs text-gray-400 mt-1">Just now</p>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                document.body.appendChild(mobileNotification);
                setTimeout(() => {
                    mobileNotification.remove();
                }, 5000);
            }
        }

        // Demo notifications every 30 seconds
        setInterval(simulateNotification, 30000);
    </script>
</body>
</html>