<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Salon Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
        }

        .admin-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(148, 163, 184, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .admin-nav-item {
            position: relative;
            overflow: hidden;
        }

        .admin-nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .admin-nav-item:hover::before {
            left: 100%;
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(1deg);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.8);
            }
        }

        .sidebar {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }

        .content-area {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-gray-50 overflow-x-hidden">

    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 content-area">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle"
                            class="lg:hidden text-gray-600 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                            <p class="text-gray-600">Manage your salon business with ease</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button
                            class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-bell text-xl"></i>
                            <span
                                class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>

                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-user text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card p-6 rounded-2xl shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Total Users</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">{{$users}}</h3>
                            <p class="text-green-600 text-sm font-medium mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+12% this month
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card p-6 rounded-2xl shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Active Salons</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">{{$totalSalons}}</h3>
                            <p class="text-purple-600 text-sm font-medium mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+3 new salons
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-spa text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card p-6 rounded-2xl shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Total Appointments</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ number_format($totalAppointments) }}
                            </h3>
                            <p class="text-pink-600 text-sm font-medium mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+18% this week
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                    </div>
                </div>


                <div class="stat-card p-6 rounded-2xl shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Revenue</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">₹{{ number_format($totalRevenue, 2) }}
                            </h3>
                            <p class="text-green-600 text-sm font-medium mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+25% this month
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-dollar-sign text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Main Management Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Manage Users Card -->
                <div class="admin-card p-8 rounded-3xl shadow-xl">
                    <div class="text-center">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg floating-animation">
                            <i class="fas fa-users text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Manage Users</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Control user accounts, permissions, and access levels. Add, edit, or remove users from the
                            system.
                        </p>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Active Users:</span>
                                <span class="font-semibold text-blue-600">1,284</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">New This Month:</span>
                                <span class="font-semibold text-green-600">+142</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-blue-600 hover:to-blue-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-users mr-2"></i>
                            Manage Users
                        </a>
                    </div>
                </div>

                <!-- Manage Salons Card -->
                <div class="admin-card p-8 rounded-3xl shadow-xl">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg floating-animation"
                            style="animation-delay: 0.2s;">
                            <i class="fas fa-spa text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Manage Salons</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Oversee salon registrations, verify businesses, and manage salon profiles and services.
                        </p>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Active Salons:</span>
                                <span class="font-semibold text-purple-600">47</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Pending Approval:</span>
                                <span class="font-semibold text-orange-600">8</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center justify-center w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-purple-600 hover:to-purple-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-spa mr-2"></i>
                            Manage Salons
                        </a>
                    </div>
                </div>

                <!-- Manage Appointments Card -->
                <div class="admin-card p-8 rounded-3xl shadow-xl">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg floating-animation"
                            style="animation-delay: 0.4s;">
                            <i class="fas fa-calendar-alt text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Manage Appointments</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Monitor all appointments across the platform, handle disputes, and manage scheduling
                            conflicts.
                        </p>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Total Appointments:</span>
                                <span class="font-semibold text-pink-600">8,942</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Today's Bookings:</span>
                                <span class="font-semibold text-green-600">127</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center justify-center w-full bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-pink-600 hover:to-pink-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Manage Appointments
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Recent Activity</h2>
                    <button class="text-blue-600 hover:text-blue-700 font-medium">View All</button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">New salon registered</p>
                            <p class="text-gray-600 text-sm">Glamour Beauty Spa joined the platform</p>
                        </div>
                        <span class="text-gray-500 text-sm">2 min ago</span>
                    </div>

                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-check text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">Appointment milestone reached</p>
                            <p class="text-gray-600 text-sm">System processed 10,000+ appointments</p>
                        </div>
                        <span class="text-gray-500 text-sm">1 hour ago</span>
                    </div>

                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-purple-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">Revenue target achieved</p>
                            <p class="text-gray-600 text-sm">Monthly revenue exceeded $50,000</p>
                        </div>
                        <span class="text-gray-500 text-sm">3 hours ago</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Close sidebar on mobile when clicking nav items
        document.querySelectorAll('.admin-nav-item').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });

        // Responsive sidebar handling
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Initialize sidebar state
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
        }

        // Smooth loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
        });

        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.5s ease';
    </script>

</body>

</html>