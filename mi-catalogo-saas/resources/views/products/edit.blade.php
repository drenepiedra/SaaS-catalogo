@extends('layouts.app')

@section('title', 'Editar producto')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <a href="{{ route('products.index') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">&larr; Volver a productos</a>
        <h1 class="text-2xl font-bold text-purple-950 mt-2">Editar producto</h1>
    </div>

    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-8">
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <x-input-label for="name" value="Nombre del producto" />
                <x-text-input id="name" type="text" name="name" :value="old('name', $product->name)" required />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-5">
                <x-input-label for="category_id" value="Categoría" />
                <select id="category_id" name="category_id" class="w-full px-4 py-2.5 border border-purple-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none bg-white transition-colors">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" />
            </div>

            <div class="mb-5">
                <x-input-label for="price" value="Precio" />
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">$</span>
                    <x-text-input id="price" type="number" name="price" :value="old('price', $product->price)" step="0.01" min="0" required class="pl-7" />
                </div>
                <x-input-error :messages="$errors->get('price')" />
            </div>

            <div class="mb-5">
                <x-input-label for="description" value="Descripción (opcional)" />
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2.5 border border-purple-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none placeholder-gray-400 transition-colors">{{ old('description', $product->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>

            <div class="mb-6">
                <x-input-label for="image" value="Imagen (opcional)" />
                @if ($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 rounded-xl object-cover border border-purple-100">
                    </div>
                @endif
                <input id="image" type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp" class="w-full px-4 py-2.5 border border-purple-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition-colors" />
                <p class="mt-1 text-xs text-gray-400">JPEG, PNG o WebP. Máximo 2MB. Deja vacío para mantener la imagen actual.</p>
                <x-input-error :messages="$errors->get('image')" />
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('products.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancelar
                </a>
                <x-primary-button>
                    Actualizar producto
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
