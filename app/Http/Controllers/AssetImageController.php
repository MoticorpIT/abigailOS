<?php

namespace App\Http\Controllers;

use App\Asset;
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

		$images = $user->getMedia('images');

		return redirect()->back()->with(compact('images'));

	  }
  }
