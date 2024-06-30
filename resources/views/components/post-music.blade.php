@props(['music'])

<div class="post-music w-2/6 h-96 mt-10 bg-white rounded-lg shadow-md p-4">
    <div class="flex items-center gap-1">
        <img class="h-8 w-8 rounded-full" src="{{ asset('assets/user.png') }}" alt="Usuário">
        <span>{{ $music->user->name }}</span>
    </div>

    <div class="mt-4">
        @if ($music->url_video)
            @php
                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $music->url_video, $matches);
                $video_id = $matches[1] ?? null;
            @endphp
            @if ($video_id)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
                <p>URL de vídeo inválida</p>
            @endif
        @elseif ($music->file_path)
            <audio controls>
                <source src="{{ Storage::url($music->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @endif
    </div>
</div>
