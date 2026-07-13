@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-purple-950">Categorías</h1>
            <p class="text-purple-600 mt-1">Organiza tus productos por categorías</p>
        </div>
        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nueva categoría
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm overflow-hidden">
        @if ($categories->isEmpty())
            <div class="p-12 text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <p class="text-gray-500">No tienes categorías aún.</p>
                <a href="{{ route('categories.create') }}" class="mt-2 inline-block text-purple-600 hover:text-purple-700 font-medium text-sm">Crea tu primera categoría</a>
            </div>
        @else
            <table class="w-full">
                <thead>
                    <tr class="bg-purple-50 border-b border-purple-100">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Nombre</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Descripción</th>
                        <th class="text-center px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Productos</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-50">
                    @foreach ($categories as $category)
                        <tr class="hover:bg-purple-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-purple-950">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description ?? '—' }}</td>
                            <td class="px-6 py-4 text-sm text-center text-purple-600">{{ $category->products_count }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('categories.edit', $category) }}" class="inline-flex items-center px-3 py-1.5 text-purple-600 hover:text-purple-800 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors text-xs font-medium">
                                    Editar
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg transition-colors text-xs font-medium">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-purple-100">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
