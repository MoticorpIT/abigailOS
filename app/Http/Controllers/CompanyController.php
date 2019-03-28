<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyType;
use App\Account;
use App\Asset;
use App\Note;
use App\Status;
use App\Exports\CompanyExport;
use App\Http\Requests\CompanyRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}


	// Export to Excel File
	public function export() 
	{
		return Excel::download(new CompanyExport, 'abigailos-companies.xlsx');
	}


	// Show all Companies (table)
	public function index()
	{
		// DATABASE QUERIES
		$companies = Company::all();
		return view('companies.index', compact('companies'));
	}


	// Company Create Form (view)
	public function create()
	{
		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// Company_types needs to be changed in the constants.php file AND on the DB
		$states = Config::get('constants.states');
		$company_types = Config::get('constants.company_types');

		return view('companies.create', compact('company_types', 'states'));
	}


	// Store a New Company
	public function store(CompanyRequest $request)
	{
		// Validate Form Data
		$validData = $request->validated();

		// Create Company
		$company = Company::create($validData);

		// Save the Company
		$company->save();

		// Set Notifications
		if (!$company->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The company was saved successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('companies.show', $company);
	}


	// Show One Company (profile)
	public function show(Company $company)
	{
		// DATABASE QUERIES
		$assets = Asset::where('company_id', $company->id)->get();
		$accounts = Account::where('company_id', $company->id)->get();
		$notes = Note::where('company_id', $company->id)->active()->ordered()->get();
		
		return view('companies.show', compact('company', 'assets', 'notes', 'accounts'));
	}


	// Company Edit Form (view)
	public function edit(Company $company)
	{
		// CONFIG/CONSTANTS.PHP 'QUERIES'
		// Company_types + statuses need to be changed in the constants.php file AND on the DB (if it exists)
		$company_types = Config::get('constants.company_types');
		$statuses = Config::get('constants.statuses');
		$states = Config::get('constants.states');

		return view('companies.edit', compact('company', 'company_types', 'statuses', 'states'));
	}


	// Update an Existing Company
	public function update(CompanyRequest $request, Company $company)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Fill Data and Save Company
		$company->fill($validData);
		$company->save();
		
		// Set Notifications
		if (!$company->save()) {
			// if not saved
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} elseif($request->status_id == 2) { 
			// if deleted
			toastr()->success('The company was deleted successfully', 'Abigail Says...');
		} else {
			// if edited
			toastr()->success('The company was edited successfully!', 'Abigail Says...');
		}
		
		// Redirect
		return redirect()->route('companies.show', $company);
	}
}
