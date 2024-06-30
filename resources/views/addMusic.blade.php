<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Adicionar Música</h1>

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

            <form action="{{ route('storeMusic') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input-text name="title" label="Título" />
                <x-input-text name="artist" label="Artista" />
                <x-input-text name="album" label="Álbum" />
                <x-input-text name="description" label="Descrição" />
                <x-input-date name="release_date" label="Data de Lançamento" />
                <x-input-file name="file" label="Arquivo de Música" />
                <x-input-url name="url_video" label="Link do Vídeo" />
                <x-button-submit label="Adicionar Música" />
            </form>
        </div>
    </div>
</x-app-layout>
