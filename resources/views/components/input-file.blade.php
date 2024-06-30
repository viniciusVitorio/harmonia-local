@props(['name', 'label'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    <div class="relative">
        <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden">
        <label for="{{ $name }}" class="block text-center w-full px-4 py-2 bg-gray-200 text-gray-700 border border-gray-300 rounded cursor-pointer">
            Escolher arquivo
        </label>
        <span id="{{ $name }}-chosen" class="ml-2 text-gray-500">Nenhum arquivo escolhido</span>
    </div>
</div>

<script>
    document.getElementById('{{ $name }}').onchange = function () {
        document.getElementById('{{ $name }}-chosen').textContent = this.files[0].name;
    };
</script>
