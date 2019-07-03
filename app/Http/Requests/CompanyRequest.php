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
            'state' => 'required', 
            'zip' => 'required|min:5', 
            'phone_1' => 'required|min:7', 
            'phone_2' => 'nullable|min:7',
            'fax' => 'nullable|min:7',
            'email' => 'nullable|email',
            'incorp_date' => 'nullable|date',
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
