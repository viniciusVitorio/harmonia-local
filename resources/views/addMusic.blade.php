<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Adicionar Música</h1>

            <form action="{{ route('home') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input-text name="title" label="Título" />
                <x-input-text name="artist" label="Artista" />
                <x-input-text name="album" label="Álbum" />
                <x-input-text name="genre" label="Gênero" />
                <x-input-date name="release_date" label="Data de Lançamento" />
                <x-input-file name="file" label="Arquivo de Música (MP3/WAV)" />
                <x-input-url name="youtube_link" label="Link do YouTube" />
                <x-button-submit label="Adicionar Música" />
            </form>
        </div>
    </div>
</x-app-layout>
