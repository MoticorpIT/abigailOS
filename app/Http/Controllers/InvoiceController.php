<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Contract;
use App\Http\Requests\InvoiceRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InvoiceController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}


	// Show All Invoices (table)
	public function index()
	{
		// Database Queries
		$invoices = Invoice::with(['contract', 'contract.tenant', 'contract.asset'])->get();
		return view('invoices.index', compact('invoices'));
	}


	// Invoice Create Form (view)
	public function create()
	{
		// Database Queries
		$contracts = Contract::with(['asset', 'tenant'])->notEnded()->get();

		// Config/Constants.php 'Queries'
		// Changes need to be made in the constants.php file AND on the DB
		$statuses = Config::get('constants.statuses');
		$priorities = Config::get('constants.priorities');

		return view('invoices.create', compact('contracts', 'priorities', 'statuses'));
	}


	// Store a New Invoice
	public function store(InvoiceRequest $request)
	{
		// Validate Form Data
		$validData = $request->validated();

		// Create Invoice
		$invoice = Invoice::create($validData);

		// Save the Invoice
		$invoice->save();

		// Set Notifications
		if (!$invoice->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The invoice was saved successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('invoices.show', $invoice);
	}


	// Show One Invoice
	public function show($id)
	{
		$invoice = Invoice::with(['contract', 'contract.asset', 'contract.asset.company', 'contract.tenant'])->findOrFail($id);
		// Config/Constants.php 'Queries'
		// Changes need to be made in the constants.php file AND on the DB
		$statuses = Config::get('constants.statuses');
		$priorities = Config::get('constants.priorities');

		return view('invoices.show', compact('invoice', 'statuses', 'priorities'));
	}


	// Invoice Edit Form (view)
	public function edit(Invoice $invoice)
	{
		// Database Queries
		$contracts = Contract::with(['tenant', 'asset'])->notEnded()->get();

		// Config/Constants.php 'Queries'
		// Changes need to be made in the constants.php file AND on the DB
		$statuses = Config::get('constants.statuses');
		$priorities = Config::get('constants.priorities');

		return view('invoices.edit', compact('invoice', 'contracts', 'statuses', 'priorities'));
	}


	// Update an Existing Invoice
	public function update(InvoiceRequest $request, Invoice $invoice)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Fill Data and Save Invoice
		$invoice->fill($validData);
		$invoice->save();
		
		// Set Notifications
		if (!$invoice->save()) {
			// if not saved
			toastr()->error('An error has occurred. If it persists, contact the manager.');
		} else {
			// if edited
			toastr()->success('The invoice was edited successfully!', 'Abigail Says...');
		}
		
		// Redirect
		return redirect()->route('invoices.show', $invoice);
	}
}
