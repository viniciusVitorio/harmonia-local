@props(['name', 'label', 'value' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="w-96 border border-gray-300 rounded p-2" value="{{ old($name, $value) }}">
</div>
