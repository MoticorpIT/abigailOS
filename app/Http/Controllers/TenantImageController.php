<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;

class TenantImageController extends Controller
{
    // STORE LOGO
    public function store(Request $request)
    {
    	/*
    	  1. Get Tenant by ID
    	  2. Get Tenant's Associated Media (image)
    	  3. Change the name of the file to the tenant's name
    	  4. Add it to the Tenants collection
    	*/
    	$tenant = Tenant::findOrFail($request->tenant_id);
        $tenant->addMedia($request->image)
			->usingFileName($tenant->first_name)
        	->toMediaCollection('tenants');

        /*
          1. Get Tenant's Associated Media (image)
          2. Set the tenant->image_id to the images Id
          3. Update the tenant with the image_id
        */
        $image = $tenant->getFirstMedia('tenants');
        $tenant->image_id = $image->id;
        $tenant->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$tenant->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The logo was uploaded successfully!', 'Abigail Says...');
		}

		// REDIRECT USER BACK
        return redirect()->route('tenants.show', $tenant);
    }
}
