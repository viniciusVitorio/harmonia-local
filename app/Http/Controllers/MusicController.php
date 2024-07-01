<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::with(['user', 'likes', 'comments'])->get();
        return view('home', compact('musics'));
    }
}
