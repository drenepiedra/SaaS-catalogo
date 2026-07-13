<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
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
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-purple-50">
    <div class="min-h-screen flex flex-col">
        <nav class="w-full py-6 px-8">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <span class="font-bold text-xl text-purple-950">{{ config('app.name') }}</span>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-purple-700 hover:text-purple-900 text-sm font-medium">Iniciar sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">Crear cuenta</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <div class="flex-1 flex items-center justify-center px-8 py-20">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-flex items-center px-4 py-1.5 bg-purple-100 text-purple-700 text-sm font-medium rounded-full mb-6">
                    Plataforma SAAS para catálogos
                </span>
                <h1 class="text-4xl md:text-6xl font-bold text-purple-950 leading-tight mb-6">
                    Tu catálogo digital<br>
                    <span class="text-purple-600">en un solo lugar</span>
                </h1>
                <p class="text-lg text-purple-700/70 max-w-2xl mx-auto mb-10">
                    Crea y gestiona el catálogo de tu emprendimiento o negocio de forma sencilla.
                    Organiza tus productos por categorías, define precios y comparte con tus clientes.
                </p>
                <div class="flex items-center justify-center space-x-4">
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-xl transition-colors shadow-sm text-lg">
                        Comenzar gratis
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-3 border border-purple-200 hover:border-purple-300 text-purple-700 font-semibold rounded-xl transition-colors text-lg">
                        Iniciar sesión
                    </a>
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-purple-950 mb-2">Categorías</h3>
                        <p class="text-sm text-purple-600">Organiza tus productos en categorías personalizadas para que tus clientes encuentren lo que buscan.</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-purple-950 mb-2">Productos</h3>
                        <p class="text-sm text-purple-600">Agrega productos con imágenes, descripciones y precios. Todo desde un panel fácil de usar.</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-purple-950 mb-2">Panel propio</h3>
                        <p class="text-sm text-purple-600">Cada negocio tiene su propio panel de administración independiente y seguro.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="py-6 border-t border-purple-100">
            <p class="text-center text-sm text-purple-400">{{ config('app.name') }} &mdash; Tu catálogo digital</p>
        </footer>
    </div>
</body>
</html>
