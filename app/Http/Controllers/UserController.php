<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {

        $userTypesCharacteristics = [
            'userType' => array_combine(User::TYPES, User::TYPES),
            'availability' => array_combine(User::AVAILABILITY, User::AVAILABILITY),
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
}