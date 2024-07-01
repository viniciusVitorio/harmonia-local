<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($musicId)
    {
        $like = Like::where('user_id', Auth::id())->where('music_id', $musicId)->first();

        if (!$like) {
            Like::create([
                'user_id' => Auth::id(),
                'music_id' => $musicId
            ]);
        }

        return redirect()->back();
    }

    public function destroy($musicId)
    {
        $like = Like::where('user_id', Auth::id())->where('music_id', $musicId)->first();

        if ($like) {
            $like->delete();
        }

        return redirect()->back();
    }
}
