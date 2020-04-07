<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlists";

    public function utilisateur(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function playlistsContent()
    {
        return $this->hasMany("App\PlaylistContent", "id_playlists");
    }
}
