@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <span class="inline-flex w-16 h-16 bg-purple-600 rounded-2xl items-center justify-center mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </span>
            <h1 class="text-2xl font-bold text-purple-950">Crear tu cuenta</h1>
            <p class="text-purple-600 mt-1">Comienza a gestionar tu catálogo</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-purple-100 p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <x-input-label for="name" value="Nombre completo" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-5">
                    <x-input-label for="business_name" value="Nombre del negocio" />
                    <x-text-input id="business_name" type="text" name="business_name" :value="old('business_name')" required placeholder="Nombre de tu emprendimiento" />
                    <x-input-error :messages="$errors->get('business_name')" />
                </div>

                <div class="mb-5">
                    <x-input-label for="email" value="Correo electrónico" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@email.com" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="mb-5">
                    <x-input-label for="password" value="Contraseña" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password_confirmation" value="Confirmar contraseña" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <x-primary-button class="w-full justify-center">
                    Crear cuenta
                </x-primary-button>

                <p class="mt-6 text-center text-sm text-gray-500">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700 font-medium">Inicia sesión</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
