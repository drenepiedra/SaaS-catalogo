<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @theme {
            --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
            --color-purple-50: #faf5ff;
            --color-purple-100: #f3e8ff;
            --color-purple-200: #e9d5ff;
            --color-purple-300: #d8b4fe;
            --color-purple-400: #c084fc;
            --color-purple-500: #a855f7;
            --color-purple-600: #9333ea;
            --color-purple-700: #7e22ce;
            --color-purple-800: #6b21a8;
            --color-purple-900: #581c87;
            --color-purple-950: #3b0764;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-purple-50 text-gray-900 antialiased">
    @if (auth()->check())
        <nav class="bg-white border-b border-purple-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                            <span class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <span class="font-semibold text-purple-900 text-lg">{{ config('app.name') }}</span>
                        </a>
                        <div class="hidden md:flex ml-10 space-x-1">
                            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                Dashboard
                            </x-nav-link>
                            <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.*')">
                                Categorías
                            </x-nav-link>
                            <x-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                                Productos
                            </x-nav-link>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-purple-600 hidden sm:block">{{ auth()->user()->business_name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-purple-700 hover:text-purple-900 hover:bg-purple-50 rounded-lg transition-colors">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endif

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
