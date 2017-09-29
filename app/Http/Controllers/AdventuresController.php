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


    public function createNewAdventure(){
        $pageData = [
            'adventureStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
            'availability' => array_combine(User::AVAILABILITY, User::AVAILABILITY),
        ];

        return view('adventures.create', $pageData);
    }

    public function saveNewAdventure(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $attendee = new AdventureAttendee();
        $adventure = new Adventure();
        $adventure->game_type = $request->get('game_type');
        $adventure->max_nr_of_players = $request->get('max_nr_of_players');
        $attendee->user_id = $userId;

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
        if($request->get('dungeon_master') == null) {
            $attendee->is_dm = false;
        } else {
            $attendee->is_dm = true;
        }
        $attendee->experience_with_games = $request->get('experience_with_games');
        $attendee->save();
        $user->availability = $request->get('availability');
        $user->save();

        flash()
            ->success(
            'Succesfully created adventure #' . $attendee->adventure_id .
            ". You can now view it in the adventure list or view it individually here - ADD LINKS PLEASE")
            ->important();
        return back();
    }


    public function joinExistingAdventure($adventureId){

        $adventure = Adventure::find($adventureId);
        $attendees = AdventureAttendee::where('adventure_id', '=', $adventureId)->get();
        $userNames = [];
        $dmOptions = [];
        $everyonesAvailability = [];
        $experienceWithGames = [];

        foreach($attendees as $attendee){
            $userId = $attendee->user_id;
            $user = User::find($userId);
            $userNames[] = $user->name;
            $dmOptions[] = $attendee->is_dm;
            $experienceWithGames[] = $attendee->experience_with_games;
            $everyonesAvailability[] = $user->availability;
        }

        //calculate how many players are needed
        $nrOfRemainingSpots = $adventure->max_nr_of_players - $attendees->count() + 1; // +1 because we don't count the dm

        $pageData = [
            'adventure' => $adventure,
            'attendees' => $attendees,
            'userNames' => $userNames,
            'dmOptions' => $dmOptions,
            'availabilities' => $everyonesAvailability,
            'spotsLeft' => $nrOfRemainingSpots,
            'experienceWithGames' => $experienceWithGames,
            'availability' => array_combine(User::AVAILABILITY, User::AVAILABILITY),
        ];

        return view('adventures.join', $pageData);
    }

    public function confirmJoinExistingAdventure(Request $request, $adventureId){


        $attendee = new AdventureAttendee();
        $userId = Auth::user()->id;

        $user = User::find($userId);
        $adventure = Adventure::find($adventureId);
        $attendee->user_id = $userId;

        if($request->get('dungeon_master') == true) {
            $attendee->is_dm = true;
        } else {
            $attendee->is_dm = false;
        }

        if($request->get('host_of_adventure') == true) {
            $attendee->is_host = $userId;
        } else {
            $attendee->is_host = false;
        }

        $attendee->adventure_id = $adventureId;
        $attendee->place = $request->get('place');
        $attendee->inventory = $request->get('inventory');
        $attendee->experience_with_games = $request->get('experience_with_games');
        $attendee->save();
        $adventure->save();
        $user->availability = $request->get('availability');
        $user->save();
        return back();
    }
}