<x-app-layout>
    <section class="w-full flex flex-col items-center gap-4">
        @foreach($musics as $music)
            <x-post-music :music="$music" />
        @endforeach
    </section>
</x-app-layout>
