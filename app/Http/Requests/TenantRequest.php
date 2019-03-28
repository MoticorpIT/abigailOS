<?php

namespace App\Http\Requests;

use App\Tenant;
use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// General Rules
    	$rules = [
    		'first_name' => 'required',
            'last_name' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'co_first_name' => 'nullable',
            'co_last_name' => 'nullable',
            'co_phone_1' => 'nullable',
            'co_phone_2' => 'nullable',
            'co_email' => 'nullable',
            'street_1' => 'required',
            'street_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
    		'account_standing_id' => 'required',
    		'status_id' => 'required',
    	];

    	// Store Specific Rules
    	// if ($this->getMethod() == 'POST') {
    	// 	$rules += [
    	// 		'name' => 'unique:companies|required'
    	// 	];
    	// }

    	return $rules;
    }
}
