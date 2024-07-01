@props(['music'])

<div class="post-music w-full md:w-2/3 lg:w-1/2 xl:w-1/3 h-auto my-5 bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center gap-3 mb-4">
        <img class="h-10 w-10 rounded-full" src="{{ asset('assets/user.png') }}" alt="Usuário">
        <span class="font-semibold">{{ $music->user->name }}</span>
    </div>

    <div class="mt-4 w-full">
        <span class="text-xl font-bold">Titulo: {{ $music->title }}</span>
        <p class="text-sm text-gray-600">Artista: {{ $music->artist }}</p>
        <p class="text-sm text-gray-600">Album: {{ $music->album }}</p>
        <p class="mt-2">{{ $music->description }}</p>
        <p class="text-sm text-gray-500 mt-2">Lançado em: {{ \Carbon\Carbon::parse($music->release_date)->format('d/m/Y') }}</p>

        @if ($music->url_video)
            @php
                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $music->url_video, $matches);
                $video_id = $matches[1] ?? null;
            @endphp
            @if ($video_id)
                <iframe class="w-full h-64" src="https://www.youtube.com/embed/{{ $video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
                <p>URL de vídeo inválida</p>
            @endif
        @elseif ($music->file_path)
            <audio controls class="w-full">
                <source src="{{ Storage::url($music->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @endif
    </div>

    <div class="mt-4 flex items-center">
        @php
            $userLike = $music->likes->where('user_id', auth()->id())->first();
        @endphp
        @if($userLike)
            <form action="{{ route('likes.destroy', $music->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4f46e5" viewBox="0 0 256 256">
                        <path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32Z"></path>
                    </svg>
                </button>
            </form>
        @else
            <form action="{{ route('likes.store', $music->id) }}" method="POST">
                @csrf
                <button type="submit" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4f46e5" viewBox="0 0 256 256">
                        <path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path>
                    </svg>
                </button>
            </form>
        @endif
        <span class="ml-2">{{ $music->likes->count() }} curtidas</span>
    </div>

    @auth
        <form action="{{ route('comments.store', $music->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Add a comment..."></textarea>
            <button type="submit" class="mt-2 bg-[#4f46e5] text-white py-2 px-4 rounded">Comment</button>
        </form>
    @endauth

    <div class="mt-4">
        @foreach ($music->comments as $comment)
            <div class="mt-2">
                <span class="font-bold">{{ $comment->user->name }}</span>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
</div>
