<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::with(['user', 'likes', 'comments'])->orderBy('created_at', 'desc')->get();
        return view('home', compact('musics'));
    }

    public function edit($id)
    {
        $music = Music::findOrFail($id);

        if (auth()->id() !== $music->user_id) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar esta música.');
        }

        return view('editMusic', compact('music'));
    }


    public function update(Request $request, Music $music)
    {
        if ($music->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar este post.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'album' => 'nullable|max:255',
            'description' => 'nullable|max:255',
            'url_video' => 'nullable|url',
            'release_date' => 'nullable|date',
            'file' => 'nullable|file|mimes:mp3,mp4,wav|max:102400',
        ]);

        if ($request->hasFile('file')) {
            if ($music->file_path) {
                Storage::delete($music->file_path);
            }
            $path = $request->file('file')->store('music_files', 'public');
            $music->file_path = $path;
        }

        $music->title = $request->title;
        $music->artist = $request->artist;
        $music->album = $request->album;
        $music->description = $request->description;
        $music->url_video = $request->url_video;
        $music->release_date = $request->release_date;
        $music->save();

        return redirect()->route('home')->with('success', 'Música atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $music = Music::findOrFail($id);

        if ($music->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para excluir este post.');
        }

        if ($music->file_path) {
            Storage::delete($music->file_path);
        }

        $music->delete();

        return redirect()->route('home')->with('success', 'Música excluída com sucesso!');
    }
}
