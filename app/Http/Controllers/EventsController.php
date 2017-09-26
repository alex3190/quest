<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventsController
{
    public function index() {
        $allEvents = Event::all();

        foreach($allEvents as $event){
            $dungeonMaster = User::find($event->dungeon_master);
            $event->dungeon_master_name = $dungeonMaster->name;
        }
        $pageData = [
            'events' => $allEvents,
            'eventStatuses' => Event::STATUSES,
            'gameTypes' => Event::GAMES,
        ];
        return view('events.list', $pageData);
    }


    public function saveNewEvent(Request $request)
    {
        $userId = Auth::user()->id;
        $event = new Event();
        $event->game_type = $request->get('game_type');
        $event->max_nr_of_players = $request->get('max_nr_of_players');
        $event->is_full = false;
        $event->occurred = false;
        if($request->get('dungeon_master') == true) {
            $event->dungeon_master = $userId;
        } else {
            $event->dungeon_master = null;
        }
        $event->status = Event::STATUS_NEW;
        $event->city = $request->get('city');
        $event->save();

        return back();
    }
}