<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Note;
use App\Contract;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
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
		$assets = Asset::orderBy('name')->get();
		return view('assets.index', compact('assets'));
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
		$asset_types = Config::get('constants.asset_types');

		return view('assets.create', compact('states', 'asset_types'));
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
	 * @param  \App\Asset  $asset
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$asset = Asset::find($id);
		$notes = Note::where('asset_id', $id)->get();
		$accounts = Account::where('asset_id', $id)->get();
		$contracts = Contract::where('asset_id', $id)->get();
		return view('assets.show', compact('asset', 'notes', 'accounts', 'contracts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Asset  $asset
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		// DATABASE QUERIES
		$asset = Company::find($id);

		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$asset_types = Config::get('constants.asset_types');
		$statuses = Config::get('constants.statuses');
		$states = Config::get('constants.states');
		
		return view('assets.edit', compact('asset', 'asset_types', 'statuses', 'states'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Asset  $asset
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Asset $asset)
	{
		//
	}
}
