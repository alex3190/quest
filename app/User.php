<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const TYPE_DM = 'dungeonMasterz';
    const TYPE_PLAYER = 'player';
    const TYPE_VISITOR = 'visitor';
    const AVAIL_ANYTIME = 'anytime';
    const AVAIL_WEEKEND = 'weekend';
    const AVAIL_WEEKDAY = 'weekdays';
    const AVAIL_WEEKNIGHT = 'weeknights';
    const AVAIL_NEVER = 'none';

    const AVAILABILITY = [
        self::AVAIL_ANYTIME,
        self::AVAIL_WEEKEND,
        self::AVAIL_WEEKNIGHT,
        self::AVAIL_WEEKDAY,
        self::AVAIL_NEVER
    ];

    const TYPES = [
        'dungeonMaster' => self::TYPE_DM,
        'player' => self::TYPE_PLAYER,
        'visitor' => self::TYPE_VISITOR
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
