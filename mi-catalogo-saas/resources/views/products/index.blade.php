@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-purple-950">Productos</h1>
            <p class="text-purple-600 mt-1">Gestiona el catálogo de tu negocio</p>
        </div>
        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo producto
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm overflow-hidden">
        @if ($products->isEmpty())
            <div class="p-12 text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <p class="text-gray-500">No tienes productos aún.</p>
                <a href="{{ route('products.create') }}" class="mt-2 inline-block text-purple-600 hover:text-purple-700 font-medium text-sm">Agrega tu primer producto</a>
            </div>
        @else
            <table class="w-full">
                <thead>
                    <tr class="bg-purple-50 border-b border-purple-100">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Producto</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Categoría</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Precio</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-purple-800 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-50">
                    @foreach ($products as $product)
                        <tr class="hover:bg-purple-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <span class="text-sm font-medium text-purple-950">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-purple-600">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-purple-950">${{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-3 py-1.5 text-purple-600 hover:text-purple-800 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors text-xs font-medium">
                                    Editar
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este producto?')">
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
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
