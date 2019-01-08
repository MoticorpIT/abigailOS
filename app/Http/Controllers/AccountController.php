<?php

namespace Http\Controllers;

use App\Account;
use App\Note;
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
        $accounts = Account::orderBy('name')->get();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$account_types = Config::get('constants.account_types');

        return view('accounts.create', compact('states', 'account_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
        $notes = Note::where('account_id', $id)->where('status_id',1)->orderBy('updated_at', 'desc')->get();
		$assets = Account::where('account_id', $id)->get();
		$contracts = Contract::where('account_id', $id)->get();
        return view('accounts.show', compact('account', 'notes', 'assets', 'contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
    	// DATABASE QUERIES
        $account = Company::find($id);

        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $account_types = Config::get('constants.account_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('accounts.edit', compact('account', 'account_types', 'statuses', 'states');
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
        //
    }
    
}
