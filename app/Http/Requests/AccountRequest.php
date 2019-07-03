<?php

namespace App\Http\Requests;

use App\Account;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// UPDATE RULES
    	$rules = [
    		'name' => 'required',
			'acct_num' => 'nullable',
			'url' => 'nullable',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required|min:5',
			'phone_1' => 'required|min:7',
			'phone_2' => 'nullable|min:7',
			'fax' => 'nullable|min:7',
			'email' => 'nullable',
			'contact_name' => 'nullable',
			'contact_phone_1' => 'nullable|min:7',
			'contact_phone_2' => 'nullable|min:7',
			'contact_email' => 'nullable',
			'account_type_id' => 'required',
			'company_id' => 'nullable',
			'asset_id' => 'nullable',
    		'status_id' => 'required'
    	];

    	// STORE RULES
    	if ($this->getMethod() == 'POST') {
    		$rules += [
    			'name' => 'unique:accounts|required'
    		];
    	}

    	return $rules;
    }
}