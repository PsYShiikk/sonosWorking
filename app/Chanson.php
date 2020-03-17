<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    protected $table = "chansons";

    public function utilisateur(){
        return $this->belongsTo("App\User", "user_id");
    }
}
