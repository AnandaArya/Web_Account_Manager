<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $table = 'games';
    protected $fillable = ['users_id', 'title', 'game_level', 'password', 'note', 'gambar'];
}
