<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Team;
//use App\Models\Game;

class League extends Model
{
    use HasFactory;

    protected $table = 'leagues';

    public function club()
    {
        return $this->hasOne(Club::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function games(){
       // return $this->hasMany(Game::class);
    }
}
