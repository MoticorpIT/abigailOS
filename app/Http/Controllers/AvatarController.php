<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
	// USER AUTH CHECK - Login Required
    public function __construct()
    {
        $this->middleware('auth');
    }

    // STORE AVATAR
    public function store(Request $request)
    {
    	$user = auth()->user();
        $user->addMedia($request->avatar)
			->usingFileName($user->name)
        	->toMediaCollection('avatars');

        $avatar = $user->getFirstMedia('avatars');
        $user->avatar_id = $avatar->id;
        $user->save();

        // dd($avatar);
        return redirect()->back();
    }

    // UPDATE AVATAR
    public function update()
    {
        //
    }
}
