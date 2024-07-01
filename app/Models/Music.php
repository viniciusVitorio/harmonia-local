<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'music'; // Adicione esta linha para especificar o nome da tabela

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

    /**
     * Get the likes for the music.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the music.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
