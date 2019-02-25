<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Company;
use App\Note;
use App\Contract;
use App\Account;
use App\Exports\AssetExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
	/** CHECK IF USER IS LOGGED IN */
	public function __construct()
	{
		$this->middleware('auth');
	}

    /* Export to Excel File */
    public function export() 
    {
        return Excel::download(new AssetExport, 'abigailos-assets.xlsx');
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
		// DATABASE QUERIES
		$companies = Company::active()->get();

		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$asset_types = Config::get('constants.asset_types');

		return view('assets.create', compact('states', 'asset_types', 'companies'));
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
			'name' => 'unique:assets|required',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone_1' => 'required',
			'phone_2' => 'nullable',
			'fax' => 'nullable',
			'email' => 'nullable',
			'rent' => 'nullable',
			'deposit' => 'nullable',
			'acquired_date' => 'nullable',
			'asset_type_id' => 'required',
			'company_id' => 'required'
		]);
		/* CREATE THE ASSET */
		$asset = new Asset(
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
				'rent' => $request->rent,
				'deposit' => $request->deposit,
				'acquired_date' => $request->aquired_date,
				'asset_type_id' => $request->asset_type_id,
				'company_id' => $request->company_id
			]
		);
		/* SAVE THE ACCOUNT */
		$asset->save();
		/* SET NOTIFICATIONS */
		if (!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The asset was saved successfully!', 'Abigail Says...');
		}
		/* REDIRECT */
		return redirect('/assets');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Asset  $asset
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$asset = Asset::findOrFail($id);
		$notes = Note::where('asset_id', $id)->active()->ordered()->get();
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
		$asset = Asset::findOrFail($id);
		$companies = Company::active()->get();

		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$asset_types = Config::get('constants.asset_types');
		$statuses = Config::get('constants.statuses');
		$states = Config::get('constants.states');
		
		return view('assets.edit', compact('asset', 'asset_types', 'statuses', 'states', 'companies'));
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
		/* VALIDATE DATA FROM FORM */
		$data = $request->validate([
			'name' => 'required',
			'street_1' => 'required',
			'street_2' => 'nullable',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone_1' => 'required',
			'phone_2' => 'nullable',
			'fax' => 'nullable',
			'email' => 'nullable',
			'rent' => 'nullable',
			'deposit' => 'nullable',
			'acquired_date' => 'nullable',
			'asset_type_id' => 'required',
			'company_id' => 'required',
			'status_id' => 'required'
		]);
		/* FILL DATA AND SAVE */
		$asset->fill($data);
		$asset->save();
		/* CREATE FLASH MESSAGES */
		if (!$asset->save()) {
        	// if not saved
            toastr()->error('An error has occurred. If it persists, contact the manager.');
        } elseif($request->status_id == 2) { 
        	// if deleted
        	toastr()->success('The asset was deleted successfully', 'Abigail Says...');
        } else {
        	// if edited
        	toastr()->success('The asset was edited successfully!', 'Abigail Says...');
        }
		/* REDIRECT USER */
		return redirect('/assets');
	}
}
