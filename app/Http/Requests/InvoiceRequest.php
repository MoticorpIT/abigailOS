<?php

namespace App\Http\Requests;

use App\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    public function authorize()
    {
    	return true;
    }

    public function rules()
    {
    	// General Rules
    	$rules = [
    		'invoice_num' => 'required',
            'due_date' => 'required|date',
            'repeats' => 'required',
            'amount_due' => 'required',
            'balance' => 'nullable',
            'contract_id' => 'required',
            'priority_id' => 'nullable',
            'status_id' => 'required',
    	];

    	// Store Only Rules
    	if ($this->getMethod() == 'POST') {
    		$rules += [
    			'invoice_num' => 'unique:invoices|required'
    		];
    	}

    	return $rules;
    }
}
