<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Custom form input focus effect */
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans min-h-screen p-4 md:p-8">

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden transition-all transform hover:shadow-lg">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white">Edit User Profile</h2>
                    <p class="text-indigo-100">Update user details and permissions</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-user-edit text-white text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6 md:p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="form-input pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500"
                               placeholder="John Doe">
                    </div>
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="form-input pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500"
                               placeholder="user@example.com">
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">User Role</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-tag text-gray-400"></i>
                        </div>
                        <select name="role"
                                class="form-select pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Regular User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                            <option value="salon_owner" {{ $user->role == 'salon_owner' ? 'selected' : '' }}>Salon Owner</option>
                            <!-- Add other roles as needed -->
                        </select>
                    </div>
                </div>

                <!-- Password Reset (Optional) -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Reset Password (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password"
                               class="form-input pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500"
                               placeholder="Leave blank to keep current password">
                    </div>
                    <p class="text-xs text-gray-500">Minimum 8 characters</p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.users.index') }}"
                       class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        <i class="fas fa-save mr-2"></i> Update User
                    </button>
                </div>
            </form>
        </div>

        <!-- User Meta -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-500">
                <div>
                    <span class="font-medium">Created:</span> {{ $user->created_at->format('M d, Y') }}
                </div>
                <div>
                    <span class="font-medium">Last Updated:</span> {{ $user->updated_at->format('M d, Y') }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>