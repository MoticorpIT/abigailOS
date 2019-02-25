<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyType;
use App\Account;
use App\Asset;
use App\Note;
use App\Status;
use App\Exports\CompanyExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    /** CHECK IF USER IS LOGGED IN */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Export to Excel File */
    public function export() 
    {
        return Excel::download(new CompanyExport, 'abigailos-companies.xlsx');
    }

    /** VIEW ALL COMPANIES */
    public function index()
    {
    	// DATABASE QUERIES
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /** VIEW COMPANY CREATE PAGE */
    public function create()
    {
        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $states = Config::get('constants.states');
        $company_types = Config::get('constants.company_types');

        return view('companies.create', compact('company_types', 'states'));
    }

    /** SAVE NEW COMPANY */
    public function store(Request $request)
    {
         /* VALIDATE DATA COMING IN FROM FORM */
        $this->validate(request(), [
            'name' => 'unique:companies|required',
            'street_1' => 'required', 
            'street_2' => 'nullable',
            'city' => 'required', 
            'state' => 'max:2|required', 
            'zip' => 'required', 
            'phone_1' => 'required', 
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable',
            'incorp_date' => 'nullable',
            'corp_id' => 'nullable',
            'city_lic' => 'nullable',
            'county_lic' => 'nullable',
            'fed_tax_id' => 'nullable',
            'company_type_id' => 'required'
        ]);

        /* SET THE UPLOAD - Used below for logo */
        $upload = '';
        if($request->logo) {
            $upload = $request->logo->store('companies');
        };

        /* CREATE THE NEW COMPANY */
        $company = new Company(
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
                'logo' => $upload,
                'incorp_date' => $request->incorp_date,
                'corp_id' => $request->corp_id,
                'city_lic' => $request->city_lic,
                'county_lic' => $request->county_lic,
                'fed_tax_id' => $request->fed_tax_id,
                'company_type_id' => $request->company_type_id,
            ]
        );
        /* SAVE THE NEW COMPANY TO DATABASE */
        $company->save();

        /* SET TOASTR FLASH MESSAGES */
        if (!$company->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The company was saved successfully!', 'Abigail Says...');
		}

		/* Redirect User After Save */
        return redirect('companies');
    }

    /** VIEW SINGLE COMPANY */
    public function show($id)
    {
    	// DATABASE QUERIES
        $company = Company::findOrFail($id);
        $assets = Asset::where('company_id', $id)->get();
        $accounts = Account::where('company_id', $id)->get();
        $notes = Note::where('company_id', $id)->active()->ordered()->get();
        $logo = Storage::url($company->logo);
        
        return view('companies.show', compact('company', 'assets', 'notes', 'accounts', 'logo'));
    }

    /** VIEW COMPANY EDIT PAGE */
    public function edit($id)
    {
        // DATABASE QUERIES
        $company = Company::findOrFail($id);

        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB (if it exists)
        $company_types = Config::get('constants.company_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('companies.edit', compact('company', 'company_types', 'statuses', 'states'));
    }

    /** SAVE COMPANY EDITS */
    public function update(Request $request, Company $company)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $data = $request->validate([
            'name' => 'required',
            'street_1' => 'required', 
            'street_2' => 'nullable',
            'city' => 'required', 
            'state' => 'max:2|required', 
            'zip' => 'required', 
            'phone_1' => 'required', 
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable',
            'incorp_date' => 'nullable',
            'corp_id' => 'nullable',
            'city_lic' => 'nullable',
            'county_lic' => 'nullable',
            'fed_tax_id' => 'nullable',
            'company_type_id' => 'required', 
            'status_id' => 'required', 
        ]);

        /* SAVE VALIDATED DATA TO DATABASE */
        $company->fill($data);
        $company->save();
        
        /* SET TOASTR FLASH MESSAGES */
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
		
		/* REDIRECT USER AFTER SAVE */
        return redirect('companies');
    }
}
