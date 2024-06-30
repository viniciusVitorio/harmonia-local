<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'artist', 
        'album', 
        'description', 
        'url_video', 
        'release_date', 
        'file_path', 
        'user_id', 
    ];

    /**
     * Get the user that owns the music.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
