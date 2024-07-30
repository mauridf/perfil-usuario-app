<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased bg-gray-100">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="space-x-4">
                    <!-- Authentication Links -->
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-gray-600 hover:text-gray-900">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ route('profile.edit') }}"
                            class="text-gray-600 hover:text-gray-900">{{ __('Profile') }}</a>
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="text-gray-600 hover:text-gray-900">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
