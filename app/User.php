<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'routes',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function getRoutesAttribute()
    {
        return [
            'this' => route('user', ['name' => $this->name]),
            'games' => route('user-games', ['name' => $this->name]),
        ];
    }
}
