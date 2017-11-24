<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 8:34 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adventure extends Model
{
    use SoftDeletes;
    const GAME_DND_PATHFINDER = 'pathfinder';
    const GAME_DND_5E = 'dnd5e';
    const GAME_NUMENERA = 'numenera';
    const GAME_BOARD_ANY = 'boardgames';

    const GAMES = [
        self::GAME_DND_5E,
        self::GAME_BOARD_ANY,
        self::GAME_DND_PATHFINDER,
        self::GAME_NUMENERA
    ];

    /**
     * Get the attendees for an adventure.
     */
    public function attendees()
    {
        return $this->hasMany('App\AdventureAttendee', 'adventure_id', 'id');
    }



    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}