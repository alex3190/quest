<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {

        $userTypesCharacteristics = [
            'userType' => User::TYPES,
            'availability' => User::AVAILABILITY
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

//        dd($user);
        $user->save();

        return back()->with('message', 'Your data has been saved!');;

    }
}