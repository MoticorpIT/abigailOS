<?php

namespace App\Http\Controllers;

use App\Account;
use App\Asset;
use App\Company;
use App\Contract;
use App\Exports\AssetExport;
use App\Http\Requests\AssetRequest;
use App\Note;
use Illuminate\Support\Facades\Config;
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
        $assets = Asset::with(['company', 'assetType'])->get();
        return view('assets.index', compact('assets'));
    }

    // Asset Create Form (view)
    public function create()
    {
        // Database Queries
        $companies = Company::active()->abcOrder()->get();

        // Config/Constants.php 'Queries'
        // Asset_types will need to be changed in the constants.php file AND on the DB
        $states = Config::get('constants.states');
        $asset_types = Config::get('constants.asset_types');

        return view('assets.create', compact('states', 'asset_types', 'companies'));
    }

    // Store a New Asset
    public function store(AssetRequest $request)
    {
        // Validate Data from Form
        $validData = $request->validated();

        // Create Asset
        $asset = Asset::create($validData);

        // Save the Asset
        $asset->save();

        // Set Notifications
        if (!$asset->save()) {
            toastr()->error('An error has occured please try again.', 'Abigail Says...');
        } else {
            toastr()->success('The asset was saved successfully!', 'Abigail Says...');
        }

        // Redirect
        return redirect()->route('assets.show', $asset);
    }

    // Show One Asset (profile)
    public function show($id)
    {
        // Database Queries
        $asset = Asset::with(['company', 'contracts', 'assetType', 'status'])->findOrFail($id);
        $images = $asset->getMedia('assets');
        $notes = Note::where('asset_id', $asset->id)->active()->ordered()->get();
        $accounts = Account::where('asset_id', $asset->id)->get();
        $contracts = Contract::where('asset_id', $asset->id)->get();

        return view('assets.show', compact('asset', 'images', 'notes', 'accounts', 'contracts'));
    }

    // Asset Edit Form (view)
    public function edit(Asset $asset)
    {
        // Database Queries
        $companies = Company::active()->get();
        $images = $asset->getMedia('assets');

        // Config/Constants.php 'Queries'
        // If asset_types or statuses need to be changed in the constants.php file AND on the DB
        $asset_types = Config::get('constants.asset_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('assets.edit', compact('asset', 'asset_types', 'statuses', 'states', 'companies', 'images'));
    }

    // Update an Existing Asset
    public function update(AssetRequest $request, Asset $asset)
    {
        // Validate Data from Form
        $validData = $request->validated();

        // Fill and Save Asset
        $asset->fill($validData);
        $asset->save();

        // Set Messages
        if (!$asset->save()) {
            // if not saved
            toastr()->error('An error has occurred. If it persists, contact the manager.');
        } elseif ($request->status_id == 2) {
            // if deleted
            toastr()->success('The asset was deleted successfully', 'Abigail Says...');
        } else {
            // if edited
            toastr()->success('The asset was edited successfully!', 'Abigail Says...');
        }

        // Redirect
        return redirect()->route('assets.show', $asset);
    }
}
