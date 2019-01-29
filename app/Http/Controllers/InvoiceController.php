<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InvoiceController extends Controller
{
    /** CHECK IF USER IS LOGGED IN */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// DATABASE QUERIES
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// DATABASE QUERIES
    	$contracts = Contract::notEnded()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $statuses = Config::get('constants.statuses');
        $priorities = Config::get('constants.priorities');

        return view('invoices.create', compact('contracts', 'priorities', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $this->validate(request(), [
            'invoice_num' => 'unique:invoices|required',
            'due_date' => 'required',
            'repeats' => 'required',
            'amount_due' => 'required',
            'balance' => 'nullable',
            'contract_id' => 'required',
            'priority_id' => 'nullable',
            'status_id' => 'required',
        ]);

        /* CREATE THE NEW INVOICE */
        $invoice = new Invoice(
            [
                'invoice_num' => $request->invoice_num,
				'due_date' => $request->due_date,
				'repeats' => $request->repeats,
				'amount_due' => $request->amount_due,
				'balance' => $request->balance,
				'contract_id' => $request->contract_id,
				'priority_id' => $request->priority_id,
				'status_id' => $request->status_id,
            ]
        );
        
        /* SAVE THE NEW INVOICE TO DATABASE */
        $invoice->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$invoice->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The invoice was saved successfully!', 'Abigail Says...');
		}

		/* Redirect User After Save */
        return redirect('invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	// DATABASE QUERIES
    	$invoice = Invoice::findOrFail($id);

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $statuses = Config::get('constants.statuses');
        $priorities = Config::get('constants.priorities');

        return view('invoices.show', compact('invoice', 'statuses', 'priorities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// DATABASE QUERIES
    	$invoice = Invoice::findOrFail($id);
    	$contracts = Contract::notEnded()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $statuses = Config::get('constants.statuses');
        $priorities = Config::get('constants.priorities');

        return view('invoices.edit', compact('invoice', 'contracts', 'statuses', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
    	/* VALIDATE DATA FROM FORM */
    	$data = $request->validate([
            'invoice_num' => 'required',
            'due_date' => 'required',
            'repeats' => 'required',
            'amount_due' => 'required',
            'balance' => 'nullable',
            'contract_id' => 'required',
            'priority_id' => 'nullable',
            'status_id' => 'required',
        ]);
        
        /* SAVE VALIDATED DATA TO DATABASE */
        $invoice->fill($data);
        $invoice->save();
        
        /* SET TOASTR FLASH MESSAGES */
        if (!$invoice->save()) {
        	// if not saved
            toastr()->error('An error has occurred. If it persists, contact the manager.');
        } else {
        	// if edited
        	toastr()->success('The invoice was edited successfully!', 'Abigail Says...');
        }
		
		/* REDIRECT USER AFTER SAVE */
        return redirect('invoices');
    }
}
