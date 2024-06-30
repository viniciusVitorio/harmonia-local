<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Music;

class AddMusicController extends Controller
{
    /**
     * Render addMusic view
     */
    public function render()
    {
        return view('addMusic');
    }

    /**
     * Store music data
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'album' => 'nullable|max:255',
            'description' => 'nullable|max:255', 
            'url_video' => 'nullable|url', 
            'release_date' => 'nullable|date',
            'file' => 'nullable|file|mimes:mp3,mp4,wav|max:102400',
        ]);

        if (!$request->hasFile('file') && !$request->url_video) {
            return back()->withErrors(['file' => 'O campo arquivo ou o link do vídeo é obrigatório.']);
        }

        $oMusic = new Music();
        $oMusic->title = $request->title;
        $oMusic->artist = $request->artist;
        $oMusic->album = $request->album;
        $oMusic->description = $request->description; 
        $oMusic->url_video = $request->url_video; 
        $oMusic->release_date = $request->release_date;
        $oMusic->user_id = Auth::id(); 

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('music_files', 'public');
            $oMusic->file_path = $path;
        }

        $oMusic->save();

        return redirect()->route('addMusic')->with('success', 'Música adicionada com sucesso!');
    }
}
