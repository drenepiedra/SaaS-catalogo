@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <span class="inline-flex w-16 h-16 bg-purple-600 rounded-2xl items-center justify-center mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </span>
            <h1 class="text-2xl font-bold text-purple-950">{{ config('app.name') }}</h1>
            <p class="text-purple-600 mt-1">Inicia sesión en tu panel</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-purple-100 p-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <x-input-label for="email" value="Correo electrónico" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu@email.com" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="mb-5">
                    <x-input-label for="password" value="Contraseña" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-purple-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <x-primary-button class="w-full justify-center">
                    Iniciar sesión
                </x-primary-button>

                <p class="mt-6 text-center text-sm text-gray-500">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-700 font-medium">Regístrate</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
