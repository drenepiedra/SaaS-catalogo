@props(['active' => false, 'href' => '#'])

@php
$classes = $active
    ? 'inline-flex items-center px-3 py-2 text-sm font-medium text-purple-700 bg-purple-50 rounded-lg transition-colors'
    : 'inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-purple-700 hover:bg-purple-50 rounded-lg transition-colors';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
