<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Asset;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ContractController extends Controller
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
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// DATABASE QUERIES
    	$assets = Asset::active()->get();
    	$tenants = Tenant::active()->notevicted()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $term_lengths = Config::get('constants.term_lengths');

        return view('contracts.create', compact('assets', 'tenants', 'term_lengths'));
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
            'deposit_amount' => 'nullable',
            'rent_amount' => 'required',
            'rent_due_date' => 'required',
            'term_length' => 'nullable',
            'term_start' => 'required',
            'term_ended' => 'nullable',
            'tenant_id' => 'required',
            'asset_id' => 'required',
        ]);

        /* CREATE THE NEW COMPANY */
        $contract = new Contract(
            [
                'deposit_amount' => $request->deposit_amount,
				'rent_amount' => $request->rent_amount,
				'rent_due_date' => $request->rent_due_date,
				'term_length' => $request->term_lenth,
				'term_start' => $request->term_start,
				'term_ended' => $request->term_ended,
				'tenant_id' => $request->tenant_id,
				'asset_id' => $request->asset_id,
            ]
        );
        
        /* SAVE THE NEW COMPANY TO DATABASE */
        $contract->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$contract->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The contract was saved successfully!', 'Abigail Says...');
		}

		/* Redirect User After Save */
        return redirect('contracts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	// DATABASE QUERIES
    	$contract = Contract::findOrFail($id);

        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// DATABASE QUERIES
    	$contract = Contract::findOrFail($id);
   		$tenants = Tenant::active()->notevicted()->get();
    	$assets = Asset::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $term_lengths = Config::get('constants.term_lengths');

        return view('contracts.edit', compact('contract', 'tenants', 'assets', 'term_lengths'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $data = $request->validate([
            'deposit_amount' => 'nullable',
			'rent_amount' => 'required',
			'rent_due_date' => 'required',
			'term_lenth' => 'nullable',
			'term_start' => 'required',
			'term_ended' => 'nullable',
			'tenant_id' => 'required',
			'asset_id' => 'required',
        ]);
        /* SAVE VALIDATED DATA TO DATABASE */
        $contract->fill($data);
        $contract->save();
        /* SET TOASTR FLASH MESSAGES */
        if (!$contract->save()) {
        	// if not saved
            toastr()->error('An error has occurred please try again.', 'Abigail Says...');
        } else {
        	// if edited
        	toastr()->success('The contract was edited successfully!', 'Abigail Says...');
        }
		/* REDIRECT USER AFTER SAVE */
        return redirect('contracts');
    }
}
