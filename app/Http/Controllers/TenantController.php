<?php

namespace App\Http\Controllers;

use App\Exports\TenantExport;
use App\Http\Requests\TenantRequest;
use App\Note;
use App\Tenant;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class TenantController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}


	// Export Tenants To Excel File
	public function export()
	{
		return Excel::download(new TenantExport, 'abigailos-tenants.xlsx');
	}


	// Show All Tenants (table)
	public function index()
	{
		$tenants = Tenant::all();
		return view('tenants.index', compact('tenants'));
	}


	// Tenant Create Form (view)
	public function create()
	{
		// Config/Constants.php 'Queries'
		// Statuses + account_standing need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$statuses = Config::get('constants.statuses');
		$account_standings = Config::get('constants.account_standings');

		return view('tenants.create', compact('statuses','account_standings','states'));
	}


	// Store a New Tenant
	public function store(TenantRequest $request)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Create Tenant
		$tenant = Tenant::create($validData);

		// Set Notifications
		$tenant->save();
		if (!$tenant->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The tenant was saved successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('tenants.show', $tenant);
	}


	// Show One Tenant (profile)
	public function show($id)
	{
		// Database Queries
		$tenant = Tenant::with(['accountStanding', 'status', 'contracts', 'contracts.asset', 'image'])->findOrFail($id);
		$notes = Note::where('tenant_id', $tenant->id)->active()->ordered()->get();

		// Config/Constants.php 'Queries'
		// Statuses + account_standing need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$statuses = Config::get('constants.statuses');
		$account_standings = Config::get('constants.account_standings');

		return view('tenants.show', compact('tenant', 'notes', 'states', 'statuses', 'account_standings'));
	}


	// Tenant Edit Form (view)
	public function edit($id)
	{
		// Database Queries
		$tenant = Tenant::with(['contracts', 'contracts.asset', 'notes', 'image'])->findOrFail($id);

		// Config/Constants.php 'Queries'
		// Statuses + account_standing need to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$account_standings = Config::get('constants.account_standings');
		$statuses = Config::get('constants.statuses');

		return view('tenants.edit', compact('tenant','statuses','account_standings','states'));
	}


	// Update an Existing Tenant
	public function update(TenantRequest $request, Tenant $tenant)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Fill and Save Tenant
		$tenant->fill($validData);
		$tenant->save();

		// Set Notifications
		if (!$tenant->save()) {
			// if not saved
			toastr()->error('An error has occurred. If it persists, contact the manager.');
		} elseif($request->status_id == 2) {
			// if deleted
			toastr()->success('The tenant was deleted successfully', 'Abigail Says...');
		} else {
			// if edited
			toastr()->success('The tenant was edited successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('tenants.show', $tenant);
	}
}
