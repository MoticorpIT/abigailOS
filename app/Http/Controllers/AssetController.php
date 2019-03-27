<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Company;
use App\Note;
use App\Contract;
use App\Account;
use App\Exports\AssetExport;
use App\Http\Requests\AssetRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}

    
    // Export to Excel File
    public function export() 
    {
        return Excel::download(new AssetExport, 'abigailos-assets.xlsx');
    }

	
	// Show all Assets (table)
	public function index()
	{
		$assets = Asset::orderBy('name')->get();
		return view('assets.index', compact('assets'));
	}

	
	// Asset Create Form (view)
	public function create()
	{
		// DATABASE QUERIES
		$companies = Company::active()->get();

		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// Asset_types will need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$asset_types = Config::get('constants.asset_types');

		return view('assets.create', compact('states', 'asset_types', 'companies'));
	}

	
	// Store a New Asset
	public function store(AssetRequest $request)
	{	
		// VALIDATE FORM DATA
		$validData = $request->validated();

		// CREATE ASSET
		$asset = Asset::create($validData);

		// SAVE THE ASSET
		$asset->save();
		
		// SET NOTIFICATIONS
		if (!$asset->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The asset was saved successfully!', 'Abigail Says...');
		}
		
		// REDIRECT
		return redirect()->route('assets.show', $asset);
	}


	// Show One Asset (profile)
	public function show($id)
	{
		// DATABASE QUERIES
		$asset = Asset::findOrFail($id);
		$images = $asset->getMedia('assets'); // for modal
		$notes = Note::where('asset_id', $id)->active()->ordered()->get();
		$accounts = Account::where('asset_id', $id)->get();
		$contracts = Contract::where('asset_id', $id)->get();

		return view('assets.show', compact('asset', 'images', 'notes', 'accounts', 'contracts'));
	}


	// Asset Edit Form (view)
	public function edit(Asset $asset)
	{
		// DATABASE QUERIES
		$companies = Company::active()->get();
		$images = $asset->getMedia('assets'); // For Modal

		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If asset_types or statuses need to be changed in the constants.php file AND on the DB
		$asset_types = Config::get('constants.asset_types');
		$statuses = Config::get('constants.statuses');
		$states = Config::get('constants.states');
		
		return view('assets.edit', compact('asset', 'asset_types', 'statuses', 'states', 'companies', 'images'));
	}

	
	// Update an Existing Asset
	public function update(AssetRequest $request, Asset $asset)
	{
		// VALIDATE DATA FROM FORM
		$validData = $request->validated();
		
		// FILL DATA AND SAVE
		$asset->fill($validData);
		$asset->save();
		
		// CREATE FLASH MESSAGES
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
		
		// REDIRECT USER
		return redirect()->route('assets.show', $asset);
	}
}
