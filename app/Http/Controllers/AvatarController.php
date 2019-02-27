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
        $avatarURL = $user->addMedia($request->avatar)->toMediaCollection('avatars');

        return redirect()->back();
    }

    // UPDATE AVATAR
    public function update()
    {
        //
    }
}
