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


    }


    public function showUserAdventures()
    {
        $userId = Auth::id();
        $adventureIds = User::find($userId)->attendees()->get(['adventure_id']);
        $adventures = Adventure::find($adventureIds);

        foreach($adventures as $adventure) {
            $adventure->created_by_name = User::find($adventure->created_by)->name;
            $firstAttendeeThatIsDm = Adventure::find($adventure->id)->attendees()->where('is_dm', true)->first();
            if(isset($firstAttendeeThatIsDm)) {
                $adventure->dungeon_master_name = User::find($firstAttendeeThatIsDm->user_id)->name;
            } else {
                $adventure->dungeon_master_name = 'No DM signed up yet!';
            }
            $adventure->freeSlots = $adventure->max_nr_of_players - Adventure::find($adventure->id)->attendees()->count() +1; //1 because we don't count the dm
        }

        $viewData = [
            'adventures' => $adventures,

        ];
        return view('account.adventures', $viewData);
    }

    public function leaveAdventure($userId, $adventureId) {
        $attendee = Adventure::find($adventureId)->attendees()->where('user_id', $userId);
        $attendee->delete();
        flash()
            ->success(
                'Succesfully left adventure!'
            )
            ->important();

        return back();
    }
}