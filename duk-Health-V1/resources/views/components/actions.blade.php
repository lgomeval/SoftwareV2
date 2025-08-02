@props(['item', 'editRoute'])

<div class="flex justify-center gap-2">
    <a href="{{ route($editRoute, $item->id) }}"
        class="px-3 py-1.5 bg-amber-600 text-white rounded-md hover:bg-amber-900 transition" title="Editar">
        Editar
    </a>
    <button wire:click="$dispatch('confirmdesactivar', {{ $item->id }})"
        class="px-3 py-1 bg-red-900 text-white rounded hover:bg-red-700 transition" title="Desactivar">
        Desactivar
    </button>
</div>
