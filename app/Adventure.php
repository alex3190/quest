<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 8:34 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_PLANNED = 'planned';
    const STATUS_OCCURRED = 'occurred';

    const STATUSES = [
        self::STATUS_NEW,
        self::STATUS_PLANNED,
        self::STATUS_OCCURRED
    ];

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

}