<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyLogoController extends Controller
{
    // STORE LOGO
    public function store(Request $request)
    {
    	/*
    	  1. Get Company by ID
    	  2. Get Company's Associated Media (logo)
    	  3. Change the name of the file to the company's name
    	  4. Add it to the Companies collection
    	*/
    	$company = Company::findOrFail($request->company_id);
        $company->addMedia($request->logo)
			->usingFileName($company->name)
        	->toMediaCollection('companies');

        /*
          1. Get Company's Associated Media (logo)
          2. Set the company->logo_id to the Logos Id
          3. Update the company with the logo_id
        */
        $logo = $company->getFirstMedia('companies');
        $company->logo_id = $logo->id;
        $company->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$company->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The logo was uploaded successfully!', 'Abigail Says...');
		}

		// REDIRECT USER BACK
        return redirect()->route('companies.show', $company);
    }
}
