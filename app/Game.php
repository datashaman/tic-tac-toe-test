<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function moves()
    {
        return $this->hasMany(Move::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
