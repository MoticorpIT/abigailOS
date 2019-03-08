<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\MediaStream;

class AssetImageController extends Controller
{
	/*
	  FOR IMAGES WE NEED TO BE ABLE TO DO THE FOLLOWING:
	√ 1. Add images associated to an asset (by id)
	√ 2. Display 'main' image on asset profile show and edit
	√ 3. Display images in modal
	√ 4. Mark an image in modal as the Main image (profile image)
	√ 5. Delete an image in modal
	√ 6. Download a single image in the modal
	√ 7. Download all images in the modal (associated to the asset)
	√ 8. Add default profile image when no images are present for the asset
	√ 9. Add default modal content when no images are present for the asset
	  10. Display thumb image as main image when clicked (in modal) - js
	  11. Scroll between images in modal by clicking arrows - js
	  12. Make it all work with the devil... i mean, AJAX - js
	*/

	// STORE IMAGES
	public function store(Request $request)
	{
		/*
		  1. Get Current Asset (by id)
		  2. Get Current Assets Associated Media (images)
		  3. Add it to the Assets collection
		*/
		$asset = Asset::findOrFail($request->asset_id);
		$asset->addMedia($request->image)
			->toMediaCollection('assets');

		if ($asset->profile_img_id == null) {
			$imageToBeProfile = $asset->getFirstMedia('assets');
			$asset->profile_img_id = $imageToBeProfile->id;
			$asset->save();
		}

		// SET NOTIFICATIONS
		if(!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was saved successfully!', 'Abigail Says...');
		}

		return redirect()->back();

	}

	// ASSOCIATE ONE IMAGE TO AN ASSET AS PROFILE_IMG_ID
	public function update(Request $request, $id)
	{
		$asset = Asset::findOrFail($request->asset_id);
        $asset->profile_img_id = $id;
        $asset->save();

		// SET NOTIFICATIONS
		if(!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was assigned successfully!', 'Abigail Says...');
		}

		return redirect()->back();

	}

	// DOWNLOAD SINGLE FILE
	public function downloadOneImage($id)
	{
		$imageToDownload = Media::findOrFail($id);

		switch ($imageToDownload->mime_type) {
			case 'image/jpeg':
				$extension = 'jpg';
				break;
			case 'image/png':
				$extension = 'png';
				break;
			case 'image/svg':
				$extension = 'svg';
				break;
			case 'image/pdf':
				$extension = 'pdf';
				break;
		}

		return response()->download($imageToDownload->getPath(), $imageToDownload->name . '.' . $extension);
	}

	// DOWNLOAD ALL FILES FOR ASSET
	public function downloadAllImages(Asset $asset)
	{
		$imagesToDownload = $asset->getMedia('assets');

		return MediaStream::create('asset-images.zip')->addMedia($imagesToDownload);
	}

	// DESTROY IMAGES
	public function destroy(Request $request, $id)
	{
		// 1. Find the imageToDelete by the ID from the form
		$imageToDelete = Media::find($id);

		/*
		  2. Find the asset by the model_id from the imageToDelete (above)
		  3. Delete the related image with id of image
		*/
		$asset = Asset::find($imageToDelete->model_id);
		$asset->deleteMedia($imageToDelete->id);

		/*
		  4. Check if the image did NOT delete
		    - If TRUE (did not delete), show Toastr error message
		    - If FALSE (did delete), show Toastr success message
		*/
		if(!$imageToDelete->delete()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The image was deleted successfully!', 'Abigail Says...');
		}

		// 5. Redirect the user back to the previous page
		return redirect()->back();
	}
}
