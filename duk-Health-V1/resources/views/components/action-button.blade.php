@props([
    'type' => 'button',
    'variant' => 'primary',
    'label' => null,
    'icon' => null,
    'loading' => false,
    'disabled' => false,
    'href' => null
])

@php
    $baseClasses = 'px-4 py-2 font-medium rounded-md focus:outline-none transition duration-200';
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
        'secondary' => 'bg-gray-300 hover:bg-gray-400 text-gray-900 focus:ring-gray-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white focus:ring-yellow-500',
    ];
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" class="{{ $classes }}">
        @if ($icon)
            <x-icon :name="$icon" class="inline w-5 h-5 mr-2" />
        @endif
        {{ $label ?? $slot }}
    </a>
@elseif ($loading)
    <div wire:loading.remove>
        <button 
            type="{{ $type }}"
            @if ($disabled) disabled @endif
            class="{{ $classes }}"
        >
            @if ($icon)
                <x-icon :name="$icon" class="inline w-5 h-5 mr-2" />
            @endif
            {{ $label ?? $slot }}
        </button>
    </div>

    <div wire:loading class="flex justify-center items-center w-full">
        <svg class="animate-spin w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0
                   3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1
                   13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
    </div>
@else
    <button 
        type="{{ $type }}"
        @if ($disabled) disabled @endif
        class="{{ $classes }}"
    >
        @if ($icon)
            <x-icon :name="$icon" class="inline w-5 h-5 mr-2" />
        @endif
        {{ $label ?? $slot }}
    </button>
@endif
