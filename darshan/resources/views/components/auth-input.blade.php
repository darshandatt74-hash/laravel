@props(['name', 'type' => 'text', 'label', 'placeholder' => null, 'required' => true])

<div class="mb-4">
    <label class="block text-lg font-semibold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>

    <input id="{{ $name }}"
           type="{{ $type }}"
           name="{{ $name }}"
           value="{{ old($name) }}"
           placeholder="{{ $placeholder ?? $label }}"
           @if ($required) required @endif
           class="w-full border-2 border-gray-300 p-3 rounded-2xl focus:outline-none focus:border-black transition duration-300">

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
