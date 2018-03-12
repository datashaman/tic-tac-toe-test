<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $appends = [
        'isFinished',
        'isStarted',
    ];

    public function moves()
    {
        return $this->hasMany(Move::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsFinishedAttribute()
    {
        return $this->moves()->count() === 9;
    }

    public function getIsStartedAttribute()
    {
        return $this->moves()->count() > 0;
    }
}
