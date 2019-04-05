<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Asset;
use App\Tenant;
use App\Http\Requests\ContractRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ContractController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}


	// Show all Contracts (table)
	public function index()
	{
		$contracts = Contract::with(['tenant', 'asset'])->get();
		return view('contracts.index', compact('contracts'));
	}


	// Contract Create Form (view)
	public function create()
	{
		// Database Queries
		$assets = Asset::active()->get();
		$tenants = Tenant::active()->notEvicted()->get();

		// Config/Constants.php 'Queries'
		$term_lengths = Config::get('constants.term_lengths');

		return view('contracts.create', compact('assets', 'tenants', 'term_lengths'));
	}


	// Store a New Contract
	public function store(ContractRequest $request)
	{
		// Validate Form Data
		$validData = $request->validated();

		// Create Contract
		$contract = Contract::create($validData);

		// Save the Contract
		$contract->save();

		// Set Notifications
		if (!$contract->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The contract was saved successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('contracts.show', $contract);
	}


	// Show One Contract
	public function show(Contract $contract)
	{
		// Database Queries
		return view('contracts.show', compact('contract'));
	}


	// Contract Edit Form (view)
	public function edit(Contract $contract)
	{
		// Database Queries
		$tenants = Tenant::active()->notEvicted()->get();
		$assets = Asset::active()->get();

		// Config/Constants.php 'Queries'
		$term_lengths = Config::get('constants.term_lengths');

		return view('contracts.edit', compact('contract', 'tenants', 'assets', 'term_lengths'));
	}


	// Update an Existing Contract
	public function update(ContractRequest $request, Contract $contract)
	{
		// Validate Data from From
		$validData = $request->validated();

		// Fill Data and Save Contract
		$contract->fill($validData);
		$contract->save();

		// Set Notifications
		if (!$contract->save()) {
			// if not saved
			toastr()->error('An error has occurred please try again.', 'Abigail Says...');
		} else {
			// if edited
			toastr()->success('The contract was edited successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('contracts.show', $contract);
	}
}
