<?php
namespace App\Http\Controllers;

use App\Adventure;
use App\AdventureAttendee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {

        $userTypesCharacteristics = [
            'userType' => array_combine(User::TYPES, User::TYPES),
            'availability' => array_combine(AdventureAttendee::AVAILABILITY, AdventureAttendee::AVAILABILITY),
        ];

        return view('account.account', $userTypesCharacteristics);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->game = $request->get('game');
        $user->availability = $request->get('availability');
        $user->country = $request->get('country');
        $user->city = $request->get('city');
        $user->type = $request->get('type');
        $user->save();

        flash()->success('Succesfully updated your info!')->important();

        return back();

    }

    public function showUserAdventures()
    {
        $userId = Auth::user()->id;
        $adventureIds = User::find($userId)->attendees()->get(['adventure_id']);
        $adventures = Adventure::find($adventureIds);

        foreach($adventures as $adventure) {
            $firstAttendeeThatIsDm = Adventure::find($adventure->id)->attendees()->where('is_dm', true)->first();
            if(isset($firstAttendeeThatIsDm)) {
                $adventure->dungeon_master_name = User::find($firstAttendeeThatIsDm->user_id)->name;
            } else {
                $adventure->dungeon_master_name = 'No DM signed up yet!';
            }
            $adventure->freeSlots = $adventure->max_nr_of_players - count(Adventure::find($adventure->id)->attendees()) +1; //1 because we don't count the dm
        }

        $viewData = [
            'adventures' => $adventures,

        ];
        return view('account.adventures', $viewData);
    }


}