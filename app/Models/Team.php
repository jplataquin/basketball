<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Leageue;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team_participants';
    
    public function leagues()
    {
        return $this->hasOne(League::class);
    }

    
}
