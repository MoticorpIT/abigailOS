<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
    	$rules = [
    		'name' => 'required',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone_1' => 'required',
			'phone_2' => 'nullable',
			'fax' => 'nullable',
			'email' => 'nullable',
			'rent' => 'nullable',
			'deposit' => 'nullable',
			'acquired_date' => 'nullable',
			'asset_type_id' => 'required',
			'company_id' => 'required',
			'status_id' => 'required'
    	];

        // STORE RULES
    	if ($this->getMethod() == 'POST') {
    		$rules += [
    			'name' => 'unique:assets|required'
    		];
    	}

    	return $rules;
    }
}
