<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class AssetImageController extends Controller
{
	/*
		FOR IMAGES WE NEED TO BE ABLE TO DO THE FOLLOWING:
		√ 1. Add images associated to an asset (by id)
		√ 2. Display 'main' image on asset profile show and edit
		√ 3. Display images in modal
		4. Mark an image in modal as the Main image (profile image)
		√ 5. Delete an image in modal
		6. Download a single image in the modal
		7. Download all images in the modal (associated to the asset)
		8. Scroll between images in modal
		9. Add default profile image when no images are present for the asset
		10. √ Add default modal content when no images are present for the asset
		11. Make it all work with the devil... i mean, AJAX
	*/

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

		/* SET NOTIFICATIONS */
		if(!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was saved successfully!', 'Abigail Says...');
		}

		return redirect()->back();

	}

	// UPDATE IMAGES
	public function update(Request $request)
	{

	}

	// DESTROY IMAGES
	public function destroy(Request $request, $id)
	{
		// GET IMAGE ITEM BY ID
		$image = Media::find($request->input('id'));

		$model_type = $image->model_type;

		$model = $model_type::find($image->model_id);
		$model->deleteMedia($image->id);

		/* SET NOTIFICATIONS */
		if(!$image->delete()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was deleted successfully!', 'Abigail Says...');
		}

		return redirect()->back();
	}
}
