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
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdventuresController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Base method of Adventures, used to get all adventures
     */
    public function index() {
        $allAdventures = Adventure::orderBy('id', 'DESC')->paginate(10);
        $dmName = 'Not yet determined';

        //need to determine how a dm is selected. I just set the first guy that signs up as dm as a dm on said adv.
        //this also counts the nr of empty slots on each adventure in the list, not counting the party starter.
        //also gets creator name
        foreach($allAdventures as $adventure){
            $firstAttendeeThatIsDm = Adventure::find($adventure->id)->attendees()->where('is_dm', true)->first();
            $adventure->dungeon_master_name = $dmName;
            $adventure->created_by_name = User::find($adventure->created_by)->name;
            if(isset($firstAttendeeThatIsDm)) {
                $adventure->dungeon_master_name = $dmName;
                $dmName = User::find($firstAttendeeThatIsDm->user_id)->name;
            }

            $adventure->freeSlots = $adventure->max_nr_of_players - count(Adventure::find($adventure->id)->attendees()) + 1; //1 because we don't count the dm
        }


        $pageData = [
            'adventures' => $allAdventures,
            'adventureStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
        ];

        return view('adventures.list', $pageData);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * used for sending data and showing the create adventure view
     */
    public function createNewAdventure(){
        $pageData = [
            'adventureStatuses' => array_combine(Adventure::STATUSES, Adventure::STATUSES),
            'gameTypes' => array_combine(Adventure::GAMES, Adventure::GAMES),
            'availability' => array_combine(AdventureAttendee::AVAILABILITY, AdventureAttendee::AVAILABILITY),
        ];

        return view('adventures.create', $pageData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * logic for saving a new adventure with data from the view
     */
    public function saveNewAdventure(Request $request)
    {
        $userId = Auth::user()->id;
        $adventure = new Adventure();
        //save stuff on adventure
        $adventure->status = Adventure::STATUS_NEW;
        $adventure->city = $request->get('city');
        $adventure->game_type = $request->get('game_type');
        $adventure->created_by = $userId;
        $adventure->max_nr_of_players = $request->get('max_nr_of_players');
        $adventure->save();

        //save on attendee
        $attendee = new AdventureAttendee();
        //save on attendee
        $attendee->user_id = $userId;
        $attendee->is_host = $request->get('is_host');
        $attendee->is_dm = $request->get('is_dm');
        $attendee->place = $request->get('place');
        $attendee->inventory = $request->get('inventory');
        $attendee->experience_with_games = $request->get('experience_with_games');
        $attendee->availability = $request->get('availability');
        $attendee->adventure_id = $adventure->id;
        $attendee->save();


        $myAccountAdventureLink = '/adventures/' . $adventure->id . '/manage';
        //success message
        flash()
            ->success(
            'Succesfully created adventure #' . $adventure->id .
            ". You can now view it in the adventure list by clicking" ."<a href='/adventures'> here </a>" . "or administrating it from" ."<a href=$myAccountAdventureLink> your acocunt </a>")
            ->important();
        return back();
    }

    /**
     * @param $adventureId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * renders the join adventure view, that also allows users to see data about the adveture.
     */
    public function joinExistingAdventure($adventureId){
        $adventure = Adventure::find($adventureId);
        $attendees = Adventure::find($adventureId)->attendees;
        $userNames = [];
        $dmOptions = [];
        $everyonesAvailability = [];
        $experienceWithGames = [];
        $isHost = [];

        foreach($attendees as $attendee){
            $userId = $attendee->user_id;

            $user = User::find($userId);
            $userNames[] = $user->name;
            $dmOptions[] = $attendee->is_dm;
            $isHost[] = $attendee->is_host;
            $experienceWithGames[] = $attendee->experience_with_games;
            $everyonesAvailability[] = $attendee->availability;
        }

        //calculate how many players are needed
        $nrOfRemainingSpots = $adventure->max_nr_of_players - $attendees->count() +1; // +1 because we don't count the dm

        $pageData = [
            'adventure' => $adventure,
            'attendees' => $attendees,
            'userNames' => $userNames,
            'dmOptions' => $dmOptions,
            'isHost' => $isHost,
            'availabilities' => $everyonesAvailability,
            'spotsLeft' => $nrOfRemainingSpots,
            'experienceWithGames' => $experienceWithGames,
            'availability' => array_combine(AdventureAttendee::AVAILABILITY, AdventureAttendee::AVAILABILITY),
        ];

        return view('adventures.join', $pageData);
    }

    /**
     * @param Request $request
     * @param $adventureId
     * @return \Illuminate\Http\RedirectResponse
     *
     * logic for the form on the join adventure page
     */
    public function confirmJoinExistingAdventure(Request $request, $adventureId){

        $attendee = new AdventureAttendee();
        $userId = Auth::user()->id;
        $attendee->user_id = $userId;

        $attendee->is_host = $request->get('is_host');
        $attendee->is_dm = $request->get('is_dm');
        $attendee->adventure_id = $adventureId;
        $attendee->place = $request->get('place');
        $attendee->inventory = $request->get('inventory');
        $attendee->availability = $request->get('availability');
        $attendee->experience_with_games = $request->get('experience_with_games');
        $attendee->save();

        return back();
    }

    public function delete($adventureId){
        $adventure = Adventure::find($adventureId);
        $adventure->delete();
        flash()
            ->success(
                'Succesfully deleted adventure!'
            )
            ->important();

        return redirect('/adventures');
    }
    public function manageAdventure($adventureId) {

        $adventure = Adventure::find($adventureId);
        $attendees = Adventure::find($adventureId)->attendees;
        $users = [];
        $userNames = [];

        foreach($attendees as $attendee) {
            $users[] = AdventureAttendee::find($attendee->id)->user;
        }

        foreach($users as $user) {
            $userNames[] = $user->name;
        }

        $viewData = [
            'adventure' => $adventure,
            'attendees' => $attendees,
            'attendeeNames' => $userNames,

        ];

        return view('adventures.manage', $viewData);

    }


}