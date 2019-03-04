<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
	// STORE AVATAR
    public function store(Request $request)
    {
    	/*
    	  1. Get Auth User
    	  2. Get Auth User's Associated Media (avatar)
    	  3. Change the name of the file to the user's name
    	  4. Add it to the Avatars collection
    	*/
    	$user = auth()->user();
        $user->addMedia($request->avatar)
			->usingFileName($user->name)
        	->toMediaCollection('avatars');

        /*
          1. Get Users Associated Media (avatar)
          2. Set the user->avatar_id to the Aavatars Id
          3. Update the user with the avatar_id
        */
        $avatar = $user->getFirstMedia('avatars');
        $user->avatar_id = $avatar->id;
        $user->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$user->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The avatar was uploaded successfully!', 'Abigail Says...');
		}

		// REDIRECT USER BACK
        return redirect()->back();
    }
}
