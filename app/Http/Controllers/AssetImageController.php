<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetImageController extends Controller
{
	/*
		FOR IMAGES WE NEED TO BE ABLE TO DO THE FOLLOWING:
		1. Add images associated to an asset (by id)
		2. Display images in modal
		3. Mark an image in modal as Main
		4. Display 'main' image on asset profile show and edit
		5. Delete an image in modal
		6. Download a single image in the modal
		7. Download all images in the modal (associated to the asset)
	*/

	// USER AUTH CHECK - Login Required
	public function __construct()
	{
		$this->middleware('auth');
	}

	// STORE IMAGES
	public function store(Request $request)
	{
		/*
		  1. Get Current Asset (by id)
		  2. Get Current Assets Associated Media (images)
		  3. Change the name of the file to the asset's name
		  4. Add it to the Assets collection
		*/
		$asset = Asset::findOrFail($request->asset_id);
		$asset->addMedia($request->image)
			->usingFileName($asset->name)
			->toMediaCollection('assets');

		/*
		  1. Get Assets Associated Media (images)
		  2. Set the user->avatar_id to the Aavatars Id
		  3. Update the user with the avatar_id
		*/
		// $avatar = $user->getFirstMedia('avatars');
		// $user->avatar_id = $avatar->id;
		// $user->save();

		/* SET TOASTR FLASH MESSAGES */
		if (!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was uploaded successfully!', 'Abigail Says...');
		}

		// REDIRECT USER BACK
		return redirect()->back();
	  }
  }
