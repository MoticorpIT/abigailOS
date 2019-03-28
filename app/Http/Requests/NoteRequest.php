<?php

namespace App\Http\Requests;

use App\Note;
use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// General Rules
    	$rules = [
    		'note' => 'required',
            'company_id' => 'nullable', 
            'account_id' => 'nullable',
            'asset_id' => 'nullable', 
            'tenant_id' => 'nullable', 
            'user_id' => 'required',
            'edited_by_user_id' => 'nullable',
            'status_id' => 'required'
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
