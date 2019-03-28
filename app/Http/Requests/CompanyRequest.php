<?php

namespace App\Http\Requests;

use App\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'street_1' => 'required', 
            'street_2' => 'nullable',
            'city' => 'required', 
            'state' => 'max:2|required', 
            'zip' => 'required', 
            'phone_1' => 'required', 
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'incorp_date' => 'nullable',
            'corp_id' => 'nullable',
            'city_lic' => 'nullable',
            'county_lic' => 'nullable',
            'fed_tax_id' => 'nullable',
            'company_type_id' => 'required',
            'status_id' => 'required'
    	];

    	// STORE RULES
    	if ($this->getMethod() == 'POST') {
    		$rules += [
    			'name' => 'unique:companies|required'
    		];
    	}

    	return $rules;
    }
}
