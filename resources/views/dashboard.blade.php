<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Header Section -->
    <header class="bg-indigo-700 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo and Brand Name -->
                <div class="flex items-center space-x-3">
                    <i class="fas fa-spa text-2xl text-pink-300"></i>
                    <h1 class="text-2xl font-bold">Glamour Salon</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Dashboard</a></li>
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Appointments</a></li>
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Clients</a></li>
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Services</a></li>
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Staff</a></li>
                        <li><a href="#" class="hover:text-pink-200 font-medium transition duration-300">Reports</a></li>
                    </ul>
                </nav>
                
                <!-- User Profile and Logout -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-1 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <span class="hidden md:inline">Admin</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-indigo-800 mb-6">Welcome to Salon Management</h1>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Manage your salon appointments, clients, services, and staff with our comprehensive management system.
            </p>
            
            <!-- Quick Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-pink-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Today's Appointments</p>
                            <h3 class="text-2xl font-bold text-gray-800">24</h3>
                        </div>
                        <i class="fas fa-calendar-check text-3xl text-pink-500"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">New Clients</p>
                            <h3 class="text-2xl font-bold text-gray-800">8</h3>
                        </div>
                        <i class="fas fa-user-plus text-3xl text-indigo-500"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Revenue Today</p>
                            <h3 class="text-2xl font-bold text-gray-800">$1,245</h3>
                        </div>
                        <i class="fas fa-dollar-sign text-3xl text-purple-500"></i>
                    </div>
                </div>
            </div>
            
            <!-- Logout Button -->
            <form action="#" method="POST">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center space-x-2 mx-auto">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2023 Salon Management System. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="hover:text-pink-300 transition duration-300"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-pink-300 transition duration-300"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-pink-300 transition duration-300"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
