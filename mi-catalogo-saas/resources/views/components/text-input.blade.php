@props(['disabled' => false, 'type' => 'text'])

<input
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 border border-purple-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none placeholder-gray-400 transition-colors']) }}
/>
