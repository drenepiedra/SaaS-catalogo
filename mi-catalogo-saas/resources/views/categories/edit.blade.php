@extends('layouts.app')

@section('title', 'Editar categoría')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <a href="{{ route('categories.index') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">&larr; Volver a categorías</a>
        <h1 class="text-2xl font-bold text-purple-950 mt-2">Editar categoría</h1>
    </div>

    <div class="bg-white rounded-2xl border border-purple-100 shadow-sm p-8">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <x-input-label for="name" value="Nombre de la categoría" />
                <x-text-input id="name" type="text" name="name" :value="old('name', $category->name)" required />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-6">
                <x-input-label for="description" value="Descripción (opcional)" />
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2.5 border border-purple-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none placeholder-gray-400 transition-colors">{{ old('description', $category->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('categories.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancelar
                </a>
                <x-primary-button>
                    Actualizar categoría
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
