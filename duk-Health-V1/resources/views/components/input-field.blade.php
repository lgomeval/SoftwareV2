<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>

    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" wire:model="{{ $model }}"
        autocomplete="{{ $autocomplete }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-zinc-600 
                            rounded-md shadow-sm focus:ring focus:ring-blue-500 dark:bg-zinc-800 dark:text-white',
        ]) }}>

    @error($model)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
