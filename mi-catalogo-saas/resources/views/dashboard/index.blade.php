@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-purple-950">Bienvenido, {{ auth()->user()->name }}</h1>
        <p class="text-purple-600 mt-1">Panel de administración de {{ auth()->user()->business_name }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-purple-600 font-medium">Categorías</p>
                    <p class="text-3xl font-bold text-purple-950 mt-1">{{ $categoriesCount }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('categories.index') }}" class="mt-4 inline-block text-sm text-purple-600 hover:text-purple-700 font-medium">
                Gestionar categorías →
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-purple-600 font-medium">Productos</p>
                    <p class="text-3xl font-bold text-purple-950 mt-1">{{ $productsCount }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block text-sm text-purple-600 hover:text-purple-700 font-medium">
                Gestionar productos →
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-6">
        <h2 class="text-lg font-semibold text-purple-950 mb-4">Productos recientes</h2>
        @if ($recentProducts->isEmpty())
            <p class="text-gray-500 text-sm">Aún no tienes productos. <a href="{{ route('products.create') }}" class="text-purple-600 hover:text-purple-700 font-medium">Crea tu primer producto</a></p>
        @else
            <div class="space-y-3">
                @foreach ($recentProducts as $product)
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                        <div class="flex items-center space-x-3">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-lg object-cover">
                            @else
                                <div class="w-10 h-10 bg-purple-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <p class="text-sm font-medium text-purple-950">{{ $product->name }}</p>
                                <p class="text-xs text-purple-600">{{ $product->category->name }} · ${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
