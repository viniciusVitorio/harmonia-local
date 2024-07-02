<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Editar Música</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                    <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded p-2" value="{{ old('title', $music->title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="artist" class="block text-gray-700 font-bold mb-2">Artista</label>
                    <input type="text" name="artist" id="artist" class="w-full border border-gray-300 rounded p-2" value="{{ old('artist', $music->artist) }}" required>
                </div>

                <div class="mb-4">
                    <label for="album" class="block text-gray-700 font-bold mb-2">Álbum</label>
                    <input type="text" name="album" id="album" class="w-full border border-gray-300 rounded p-2" value="{{ old('album', $music->album) }}">
                </div>

                <div class="mb-4">
                    <label for="genre" class="block text-gray-700 font-bold mb-2">Gênero</label>
                    <input type="text" name="genre" id="genre" class="w-full border border-gray-300 rounded p-2" value="{{ old('genre', $music->genre) }}">
                </div>

                <div class="mb-4">
                    <label for="release_date" class="block text-gray-700 font-bold mb-2">Data de Lançamento</label>
                    <input type="date" name="release_date" id="release_date" class="w-full border border-gray-300 rounded p-2" value="{{ old('release_date', $music->release_date) }}">
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-gray-700 font-bold mb-2">Arquivo de Música (MP3/WAV)</label>
                    <input type="file" name="file" id="file" class="w-full border border-gray-300 rounded p-2">
                    @if ($music->file_path)
                        <div class="mt-2">
                            <audio controls class="w-full">
                                <source src="{{ Storage::url($music->file_path) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="url_video" class="block text-gray-700 font-bold mb-2">Link do YouTube</label>
                    <input type="url" name="url_video" id="url_video" class="w-full border border-gray-300 rounded p-2" value="{{ old('url_video', $music->url_video) }}">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descrição</label>
                    <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded p-2">{{ old('description', $music->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-[#4f46e5] text-white font-bold py-2 px-4 rounded hover:bg-[#4f46e5]/90">Atualizar Música</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
