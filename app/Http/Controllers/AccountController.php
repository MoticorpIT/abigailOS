<?php

namespace App\Http\Controllers;

use App\Account;
use App\Asset;
use App\Company;
use App\Note;
use App\Contract;
use App\AccountType;
use App\Exports\AccountExport;
use App\Http\Requests\AccountRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AccountController extends Controller
{

    // Check if User is Logged In
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Export to Excel File
    public function export() 
    {
        return Excel::download(new AccountExport, 'abigailos-accounts.xlsx');
    }


    // Show All Accounts (table)
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }


    // Account Create Form (view)
    public function create()
    {
    	// DATABASE QUERIES
    	$companies = Company::active()->get();
    	$assets = Asset::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// Account types need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$account_types = Config::get('constants.account_types');

        return view('accounts.create', compact('states', 'account_types', 'assets', 'companies'));
    }


    // Store a New Account
    public function store(AccountRequest $request)
    {
    	// VALIDATE FORM DATA
    	$validData = $request->validated();

    	// CREATE ACCOUNT
        $account = Account::create($validData);
		
		// SAVE THE ACCOUNT
		$account->save();
		
		// SET NOTIFICATIONS
		if(!$account->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The account was saved successfully!', 'Abigail Says...');
		}
		
		// REDIRECT
		return redirect('accounts');
    }


    // Show One Account (profile)
    public function show($id)
    {
        $account = Account::findOrFail($id);
        $notes = Note::where('account_id', $id)->active()->ordered()->get();
        return view('accounts.show', compact('account', 'notes'));
    }


    // Account Edit Form (view)
    public function edit($id)
    {
    	// DATABASE QUERIES
        $account = Account::findOrFail($id);
        $assets = Asset::active()->get();
        $companies = Company::active()->get();

        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // Account_types + Statuses need to be changed in the constants.php file AND on the DB
        $account_types = Config::get('constants.account_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('accounts.edit', compact('account', 'account_types', 'statuses', 'states', 'assets', 'companies'));
    }


    // Update an Existing Account
    public function update(AccountRequest $request, Account $account)
    {
        // VALIDATE DATA FROM FORM
		$validData = $request->validated();

		// FILL DATA AND SAVE
		$account->fill($validData);
		$account->save();
		
		// CREATE FLASH MESSAGES
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
		
		// REDIRECT USER
		return redirect('accounts');
    }
    
}
