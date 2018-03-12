<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $appends = [
        'hash',
        'isFinished',
        'isStarted',
        'routes',
    ];

    protected $hidden = [
        'id',
        'user',
        'user_id',
    ];

    public function moves()
    {
        return $this->hasMany(Move::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHashAttribute()
    {
        return app('hashids')->encode($this->id);
    }

    public function getIsFinishedAttribute()
    {
        return $this->moves()->count() === 9;
    }

    public function getIsStartedAttribute()
    {
        return $this->moves()->count() > 0;
    }

    public function getRoutesAttribute()
    {
        return [
            'this' => route('user-game', ['name' => $this->user->name, 'hash' => app('hashids')->encode($this->id)]),
            'user' => route('user', ['name' => $this->user->name]),
        ];
    }
}
