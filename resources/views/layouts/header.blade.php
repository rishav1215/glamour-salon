<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#7c3aed',
                            700: '#6d28d9',
                        },
                        secondary: {
                            500: '#ec4899',
                            600: '#db2777',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Navbar -->
    <header class="bg-gradient-to-r from-gray-700 to-gray-400 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 p-2 rounded-lg">
                    <i class="fas fa-spa text-2xl text-pink-300"></i>
                </div>
                <span class="text-2xl font-bold tracking-tight">Glamour<span class="text-secondary-500">Salon</span></span>
            </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{route('home')}}" class="hover:text-secondary-500 transition duration-300 font-medium flex items-center py-1 border-b-2 border-transparent hover:border-secondary-500">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="#" class="hover:text-secondary-500 transition duration-300 font-medium flex items-center py-1 border-b-2 border-transparent hover:border-secondary-500">
                        <i class="fas fa-info-circle mr-2"></i> About
                    </a>
                    <a href="#" class="hover:text-secondary-500 transition duration-300 font-medium flex items-center py-1 border-b-2 border-transparent hover:border-secondary-500">
                        <i class="fas fa-envelope mr-2"></i> Contact
                    </a>
                    <a href="#" class="hover:text-secondary-500 transition duration-300 font-medium flex items-center py-1 border-b-2 border-transparent hover:border-secondary-500">
                        <i class="fas fa-calendar-alt mr-2"></i> Bookings
                    </a>
                </nav>

            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative group">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <span class="hidden md:block font-medium">{{ Auth::user()->name }}</span>
                            <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2 text-secondary-600"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:text-secondary-500 transition duration-300 font-medium">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-secondary-600 hover:bg-secondary-500 px-4 py-2 rounded-lg font-medium transition duration-300">
                        <i class="fas fa-user-plus mr-1"></i> Register
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Mobile Menu Button (hidden on larger screens) -->
    <div class="md:hidden bg-primary-700 text-white p-3 flex justify-end">
        <button id="mobile-menu-button" class="focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-primary-600 text-white">
        <div class="container mx-auto px-4 py-3 flex flex-col space-y-3">
            <a href="#" class="hover:text-secondary-500 transition duration-300 py-2 border-b border-white/10">
                <i class="fas fa-home mr-3"></i> Home
            </a>
            <a href="#" class="hover:text-secondary-500 transition duration-300 py-2 border-b border-white/10">
                <i class="fas fa-info-circle mr-3"></i> About
            </a>
            <a href="#" class="hover:text-secondary-500 transition duration-300 py-2 border-b border-white/10">
                <i class="fas fa-envelope mr-3"></i> Contact
            </a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left hover:text-secondary-500 transition duration-300 py-2">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-secondary-500 transition duration-300 py-2 border-b border-white/10">
                    <i class="fas fa-sign-in-alt mr-3"></i> Login
                </a>
                <a href="{{ route('register') }}" class="hover:text-secondary-500 transition duration-300 py-2">
                    <i class="fas fa-user-plus mr-3"></i> Register
                </a>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    <main class="py-8 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-spa text-secondary-500 mr-2"></i> Glamour Salon
                    </h3>
                    <p class="text-gray-400">Your premier destination for beauty and wellness services.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Gallery</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Hair Styling</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Makeup</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Nail Care</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Spa Treatments</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-secondary-500"></i> 123 Beauty St, City
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-secondary-500"></i> (+91) 456-7890
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-secondary-500"></i> info@glamoursalon.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Glamour Salon. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>