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
            'phone_1' => 'required|min:7',
            'phone_2' => 'nullable|min:7',
            'fax' => 'nullable|min:7',
            'email' => 'nullable',
            'co_first_name' => 'nullable',
            'co_last_name' => 'nullable',
            'co_phone_1' => 'nullable|min:7',
            'co_phone_2' => 'nullable|min:7',
            'co_email' => 'nullable',
            'street_1' => 'required',
            'street_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|min:5',
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
