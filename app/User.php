<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const TYPE_DM = 'dungeonMaster';
    const TYPE_PLAYER = 'player';
    const TYPE_VISITOR = 'visitor';
    const TYPES = [
        self::TYPE_DM,
        self::TYPE_PLAYER,
        self::TYPE_VISITOR
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
