<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary': {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
            },
            'dark-blue': '#1e3a8a'
          }
        }
      }
    }
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="h-full font-sans antialiased text-gray-800">

  <div class="flex min-h-screen">
    <!-- ✅ Sidebar stays separate -->
    <aside class="w-64 bg-dark-blue text-white h-screen sticky top-0 overflow-y-auto flex flex-col">
      @include('admin.sidebar')
    </aside>
    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-gray-50">
      <div class="p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
          <div>
            <h1 class="text-3xl font-bold text-gray-800">Admin Settings</h1>
            <p class="text-gray-500 mt-1">Manage your account settings and preferences</p>
          </div>
          <div class="flex items-center space-x-4">
            <button class="p-2 rounded-full bg-white shadow hover:bg-gray-100">
              <i class="fas fa-bell text-gray-600"></i>
            </button>
            <div class="flex items-center space-x-2">
              <img src="https://ui-avatars.com/api/?name=Admin+User&background=0ea5e9&color=fff" alt="Admin" class="w-8 h-8 rounded-full">
              <span class="font-medium">Admin</span>
            </div>
          </div>
        </div>

        <!-- Settings Form -->
        <div class="grid grid-cols-1 gap-8">
          <!-- Profile Card -->
          <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
              <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-user-circle mr-2 text-primary-600"></i> Profile Information
              </h2>
              <p class="text-sm text-gray-500 mt-1">Update your account's profile details</p>
            </div>
            <div class="p-6 space-y-4">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                  </div>
                  <input type="text" id="name" name="name" placeholder="Your full name" 
                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 py-2 border">
                </div>
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                  </div>
                  <input type="email" id="email" name="email" placeholder="your.email@example.com" 
                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 py-2 border">
                </div>
              </div>
            </div>
          </div>

          <!-- Security Card -->
          <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
              <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-shield-alt mr-2 text-primary-600"></i> Security Settings
              </h2>
              <p class="text-sm text-gray-500 mt-1">Change your password and security preferences</p>
            </div>
            <div class="p-6 space-y-4">
              <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-key text-gray-400"></i>
                  </div>
                  <input type="password" id="current_password" name="current_password" placeholder="••••••••" 
                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 py-2 border">
                </div>
              </div>
              <div>
                <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                  </div>
                  <input type="password" id="new_password" name="new_password" placeholder="••••••••" 
                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 py-2 border">
                </div>
                <p class="mt-1 text-xs text-gray-500">Minimum 8 characters with at least one number and special character</p>
              </div>
              <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                  </div>
                  <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" 
                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 py-2 border">
                </div>
              </div>
            </div>
          </div>

          <!-- Preferences Card -->
          <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
              <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-sliders-h mr-2 text-primary-600"></i> Preferences
              </h2>
              <p class="text-sm text-gray-500 mt-1">Customize your application experience</p>
            </div>
            <div class="p-6 space-y-4">
              <div class="flex items-center justify-between">
                <div>
                  <label for="dark_mode" class="block text-sm font-medium text-gray-700 mb-1">Dark Mode</label>
                  <p class="text-xs text-gray-500">Switch between light and dark theme</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" id="dark_mode" name="dark_mode" class="sr-only peer">
                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                </label>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <label for="notifications" class="block text-sm font-medium text-gray-700 mb-1">Email Notifications</label>
                  <p class="text-xs text-gray-500">Receive important updates via email</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" id="notifications" name="notifications" checked class="sr-only peer">
                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                </label>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <label for="two_factor" class="block text-sm font-medium text-gray-700 mb-1">Two-Factor Authentication</label>
                  <p class="text-xs text-gray-500">Add an extra layer of security</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" id="two_factor" name="two_factor" class="sr-only peer">
                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                </label>
              </div>
            </div>
          </div>

          <!-- Actions -->
          <div class="flex justify-end space-x-3 mt-6">
            <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-200">
              Cancel
            </button>
            <button type="submit" class="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-200">
              <i class="fas fa-save mr-2"></i> Save Changes
            </button>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Simple dark mode toggle simulation
    document.getElementById('dark_mode').addEventListener('change', function() {
      if(this.checked) {
        document.documentElement.classList.add('dark');
        document.body.classList.add('bg-gray-900');
        document.body.classList.remove('bg-gray-50');
      } else {
        document.documentElement.classList.remove('dark');
        document.body.classList.remove('bg-gray-900');
        document.body.classList.add('bg-gray-50');
      }
    });
  </script>
</body>
</html>