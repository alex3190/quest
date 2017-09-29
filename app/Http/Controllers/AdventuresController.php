<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


use App\Adventure;
use App\AdventureAttendee;
use App\EventAttendee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdventuresController
{
    public function index() {
        $allAdventures = Adventure::all();


        foreach($allAdventures as $adventure){
            $dungeonMaster = User::find($adventure->dungeon_master);
            if(isset($adventure->dungeon_master)){
                $adventure->dungeon_master_name = $dungeonMaster->name;
            } else {
                $adventure->dungeon_master_name = 'No DM signed up yet!';
            }

        }
        $pageData = [
            'adventures' => $allAdventures,
            'adventureStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
        ];
        return view('adventures.list', $pageData);
    }


    public function saveNewAdventure(Request $request)
    {
        $userId = Auth::user()->id;
        $attendee = new AdventureAttendee();
        $adventure = new Adventure();
        $adventure->game_type = $request->get('game_type');
        $adventure->max_nr_of_players = $request->get('max_nr_of_players');
        $adventure->is_full = false;
        $adventure->occurred = false;

        if($request->get('dungeon_master') == true) {
            $adventure->dungeon_master = $userId;
            $attendee->user_id = $userId;
            $attendee->is_dm = true;

        } else {
            $adventure->dungeon_master = null;
            $attendee->user_id = $userId;
            $attendee->is_dm = false;
        }

        if($request->get('host_of_adventure') == true) {
            $attendee->is_host = $userId;
        } else {
            $attendee->is_host = false;
        }

        $adventure->status = Adventure::STATUS_NEW;
        $adventure->city = $request->get('city');
        $adventure->save();
        $attendee->adventure_id = $adventure->id;
        $attendee->place = $request->get('place');
        $attendee->inventory = $request->get('inventory');
        $attendee->save();

        flash()
            ->success(
            'Succesfully created adventure #' . $attendee->adventure_id .
            ". You can now view it in the adventure list or view it individually here - ADD LINKS PLEASE")
            ->important();
        return back();
    }

    public function createNewAdventure(){
        $pageData = [
            'adventureStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
        ];

        return view('adventures.create', $pageData);
    }

    public function joinExistingAdventure($adventureId){

        $adventure = Adventure::find($adventureId);
        $attendees = AdventureAttendee::where('adventure_id', '=', $adventureId)->get();
        $dms = AdventureAttendee::where('is_dm', '=', true)->get();
        $userNames = [];
        $dmNames = [];
        $everyonesAvailability = [];

        foreach($attendees as $attendee){
            $userId = $attendee->user_id;
            $userNames[] = User::find($userId)->name;
        }

        foreach($dms as $dm) {
            $dmId = $dm->user_id;
            $dmNames[] = User::find($dmId)->name;
        }

        foreach($attendees as $attendee){
            $userId = $attendee->user_id;
            if(isset(User::find($userId)->availability)){
                $everyonesAvailability[] = User::find($userId)->availability;
            } else {
                $everyonesAvailability[] = 'Not specified';
            }

        }
        $pageData = [
            'adventure' => $adventure,
            'attendees' => $attendees,
            'userNames' => $userNames,
            'dmNames' => $dmNames,
            'availabilities' => $everyonesAvailability
        ];

        return view('adventures.join', $pageData);
    }

    public function confirmJoinExistingAdventure(){
        return back();
    }
}