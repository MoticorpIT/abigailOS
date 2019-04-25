<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// General Rules
    	$rules = [
    		'task' => 'required',
			'due_date' => 'required|date',
			'repeats' => 'required',
			'assigned_user_id' => 'required',
			'account_id' => 'nullable',
			'company_id' => 'nullable',
			'asset_id' => 'nullable',
			'parent_id' => 'nullable',
			'task_type_id' => 'nullable',
			'priority_id' => 'nullable',
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
