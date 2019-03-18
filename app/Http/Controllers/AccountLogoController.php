<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountLogoController extends Controller
{
    // STORE LOGO
    public function store(Request $request)
    {
    	/*
    	  1. Get Account by ID
    	  2. Get Account's Associated Media (logo)
    	  3. Change the name of the file to the account's name
    	  4. Add it to the Accounts collection
    	*/
    	$account = Account::findOrFail($request->account_id);
        $account->addMedia($request->logo)
			->usingFileName($account->name)
        	->toMediaCollection('accounts');

        /*
          1. Get Account's Associated Media (logo)
          2. Set the account->logo_id to the Logos Id
          3. Update the account with the logo_id
        */
        $logo = $account->getFirstMedia('accounts');
        $account->logo_id = $logo->id;
        $account->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$account->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The logo was uploaded successfully!', 'Abigail Says...');
		}

		// REDIRECT USER BACK
        return redirect()->back();
    }
}
