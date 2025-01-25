<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <a class="text-xl font-semibold text-gray-900" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="flex items-center space-x-4">
                        <!-- Left Side Of Navbar (Empty in this case) -->

                        <!-- Right Side Of Navbar -->
                        <div class="hidden md:flex items-center space-x-4">
                            @guest
                            @if (Route::has('login'))
                            <!-- Link to Login view -->
                            <a class="text-gray-700 hover:text-gray-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                            <!-- Link to Register view -->
                            <a class="text-gray-700 hover:text-gray-900" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                            <!-- Category Dropdown -->
                            <div class="relative">
                                <button class="px-4 py-2 bg-white border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                    Admin Workplace
                                </button>
                                <div class="dropdown-content absolute hidden bg-white border border-gray-300 rounded-md shadow-lg mt-2">
                                    <a href="{{ route('category') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Categories</a>
                                    <a href="{{ route('product') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Products</a>
                                </div>
                            </div>

                            <!-- User Dropdown -->
                            <div class="relative">
                                <button class="px-4 py-2 bg-white border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-content absolute hidden bg-white border border-gray-300 rounded-md shadow-lg mt-2">
                                    <!-- Logout option -->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                                </div>
                            </div>

                            <!-- Logout Form (hidden, POST method) -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        // Toggle dropdown visibility on button click
        document.querySelectorAll('.relative').forEach(function(element) {
            const button = element.querySelector('button');
            const dropdown = element.querySelector('.dropdown-content');

            button.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            // Close dropdown if clicked outside
            window.addEventListener('click', function(event) {
                if (!element.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>