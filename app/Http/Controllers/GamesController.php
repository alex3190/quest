<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:32 PM
 */

namespace App\Http\Controllers;


class GamesController
{
    public function index() {
        return view('games.games');
    }
}