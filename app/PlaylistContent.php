<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistContent extends Model
{
    protected $table = "playlistscontent";

    public function utilisateur(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function playlist(){
        return $this->belongsTo("App\Playlist", "user_id");
    }
}
