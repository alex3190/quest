<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


use App\Adventure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdventuresController
{
    public function index() {
        $allAdventures = Adventure::all();

        foreach($allAdventures as $event){
            $dungeonMaster = User::find($event->dungeon_master);
            $event->dungeon_master_name = $dungeonMaster->name;
        }
        $pageData = [
            'events' => $allAdventures,
            'eventStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
        ];
        return view('adventures.list', $pageData);
    }


    public function saveNewAdventure(Request $request)
    {
        $userId = Auth::user()->id;
        $adventure = new Adventure();
        $adventure->game_type = $request->get('game_type');
        $adventure->max_nr_of_players = $request->get('max_nr_of_players');
        $adventure->is_full = false;
        $adventure->occurred = false;
        if($request->get('dungeon_master') == true) {
            $adventure->dungeon_master = $userId;
        } else {
            $adventure->dungeon_master = null;
        }
        $adventure->status = Adventure::STATUS_NEW;
        $adventure->city = $request->get('city');
        $adventure->save();

        return back();
    }
}