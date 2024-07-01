<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $musicId)
    {
        $request->validate([
            'content' => 'required|max:255'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'music_id' => $musicId,
            'content' => $request->content
        ]);

        return back();
    }
}
