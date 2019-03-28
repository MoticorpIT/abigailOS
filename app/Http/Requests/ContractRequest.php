<?php

namespace App\Http\Requests;

use App\Contract;
use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// All Rules
    	$rules = [
    		'deposit_amount' => 'nullable',
            'rent_amount' => 'required',
            'rent_due_date' => 'required',
            'term_length' => 'nullable',
            'term_start' => 'required',
            'term_ended' => 'nullable',
            'tenant_id' => 'required',
            'asset_id' => 'required',
    	];

    	// Store Rules
    	// if ($this->getMethod() == 'POST') {
    	// 	$rules += [
    	// 		'name' => 'unique:companies|required'
    	// 	];
    	// }

    	return $rules;
    }
}
