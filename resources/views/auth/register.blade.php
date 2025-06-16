<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Glamour Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
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
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">
        <!-- Decorative Header -->
        <div class="bg-gradient-to-r from-primary-600 to-secondary-500 py-5 px-6">
            <div class="flex items-center justify-center space-x-2">
                <i class="fas fa-spa text-white text-2xl"></i>
                <span class="text-white text-xl font-bold">Glamour Salon</span>
            </div>
            <h2 class="text-white text-center text-2xl font-bold mt-2">Create Your Account</h2>
        </div>

        <!-- Form Container -->
        <div class="p-8">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-2"></i>
                        <div>
                            <h4 class="text-red-700 font-medium mb-1">Please fix these errors:</h4>
                            <ul class="list-disc list-inside text-red-600 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('custom.register') }}" class="space-y-5">
                @csrf

                <div class="space-y-1">
                    <label class="block text-gray-700 font-medium" for="name">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" id="name" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                               placeholder="John Doe">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="block text-gray-700 font-medium" for="email">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                               placeholder="your@email.com">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="block text-gray-700 font-medium" for="password">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                               placeholder="••••••••">
                        <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
                </div>

                <div class="space-y-1">
                    <label class="block text-gray-700 font-medium" for="role">Account Type</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-tag text-gray-400"></i>
                        </div>
                        <select name="role" id="role" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition appearance-none bg-white">
                            <option value="customer">Customer</option>
                            <option value="salon_owner">Salon Owner</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" required
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-primary-600 hover:underline">Terms of Service</a> and <a href="#" class="text-primary-600 hover:underline">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-primary-600 to-secondary-500 text-white py-3 px-4 rounded-lg font-medium hover:from-primary-500 hover:to-secondary-400 transition duration-300 shadow-md hover:shadow-lg">
                    Create Account
                </button>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Already have an account?</span>
                    </div>
                </div>

                <a href="{{route('login')}}" 
                   class="mt-4 w-full inline-flex justify-center items-center space-x-2 border border-gray-300 rounded-lg px-4 py-3 bg-white text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                    <i class="fas fa-sign-in-alt text-primary-500"></i>
                    <span>Sign in to your account</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>