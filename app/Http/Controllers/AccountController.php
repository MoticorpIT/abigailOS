<?php

namespace App\Http\Controllers;

use App\Account;
use App\Asset;
use App\Company;
use App\Note;
use App\Contract;
use App\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
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
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// DATABASE QUERIES
    	$companies = Company::active()->get();
    	$assets = Asset::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$account_types = Config::get('constants.account_types');

        return view('accounts.create', compact('states', 'account_types', 'assets', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* VALIDATE THE REQUEST */
		$this->validate(request(), [
			'name' => 'unique:accounts|required',
			'acct_num' => 'nullable',
			'url' => 'nullable',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone_1' => 'required',
			'phone_2' => 'nullable',
			'fax' => 'nullable',
			'email' => 'nullable',
			'contact_name' => 'nullable',
			'contact_phone_1' => 'nullable',
			'contact_phone_2' => 'nullable',
			'contact_email' => 'nullable',
			'account_type_id' => 'required',
			'company_id' => 'nullable',
			'asset_id' => 'nullable'
		]);
		/* CREATE THE ACCOUNT */
		$account = new Account(
			[
				'name' => $request->name,
				'street_1' => $request->street_1,
				'street_2' => $request->street_2,
				'city' => $request->city,
				'state' => $request->state,
				'zip' => $request->zip,
				'phone_1' => $request->phone_1,
				'phone_2' => $request->phone_2,
				'fax' => $request->fax,
				'email' => $request->email,
				'acct_num' => $request->acct_num,
				'url' => $request->url,
				'contact_name' => $request->contact_name,
				'contact_phone_1' => $request->contact_phone_1,
				'contact_phone_2' => $request->contact_phone_2,
				'contact_email' => $request->contact_email,
				'account_type_id' => $request->account_type_id,
				'company_id' => $request->company_id,
				'asset_id' => $request->asset_id,
			]
		);
		/* SAVE THE ACCOUNT */
		$account->save();
		/* SET NOTIFICATIONS */
		if(!$account->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The account was saved successfully!', 'Abigail Says...');
		}
		/* REDIRECT */
		return redirect('accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);
        $notes = Note::where('account_id', $id)->active()->ordered()->get();
        return view('accounts.show', compact('account', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// DATABASE QUERIES
        $account = Account::findOrFail($id);
        $assets = Asset::active()->get();
        $companies = Company::active()->get();

        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $account_types = Config::get('constants.account_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('accounts.edit', compact('account', 'account_types', 'statuses', 'states', 'assets', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        /* VALIDATE DATA FROM FORM */
		$data = $request->validate([
			'name' => 'required',
			'acct_num' => 'nullable',
			'url' => 'nullable',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone_1' => 'required',
			'phone_2' => 'nullable',
			'fax' => 'nullable',
			'email' => 'nullable',
			'contact_name' => 'nullable',
			'contact_phone_1' => 'nullable',
			'contact_phone_2' => 'nullable',
			'contact_email' => 'nullable',
			'account_type_id' => 'required',
			'company_id' => 'nullable',
			'asset_id' => 'nullable',
			'status_id' => 'required'
		]);
		/* FILL DATA AND SAVE */
		$account->fill($data);
		$account->save();
		/* CREATE FLASH MESSAGES */
		if (!$account->save()) {
        	// if not saved
            toastr()->error('An error has occurred. If it persists, contact the manager.');
        } elseif($request->status_id == 2) { 
        	// if deleted
        	toastr()->success('Your account was deleted successfully', 'Abigail Says...');
        } else {
        	// if edited
        	toastr()->success('Your account was edited successfully!', 'Abigail Says...');
        }
		/* REDIRECT USER */
		return redirect('accounts');
    }
    
}
