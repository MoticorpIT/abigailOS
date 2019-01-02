<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyType;
use App\Account;
use App\Asset;
use App\Note;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CompanyController extends Controller
{
    /** CHECK IF USER IS LOGGED IN */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** VIEW ALL COMPANIES */
    public function index()
    {
        $companies = Company::orderBy('name')->get();
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
        if (!$company->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Company did not save');
        } else {
            session()->flash('message', 'Company Created Successfully');
        }
        return redirect('/companies');
    }

    /** VIEW SINGLE COMPANY */
    public function show($id)
    {
        $company = Company::find($id);
        $assets = Asset::where('company_id', $id)->get();
        $accounts = Account::where('company_id', $id)->get();
        $notes = Note::where('company_id', $id)->get();
        return view('companies.show', compact('company', 'assets', 'notes', 'accounts'));
    }

    /** VIEW COMPANY EDIT PAGE */
    public function edit($id)
    {
        // DATABASE QUERIES
        $company = Company::find($id);
        $notes = Note::where('company_id', $id)->get();

        // CONFIG/CONSTANTS.PHP 'QUERIES'
        // If either need to be changed, they need to be changed in the constants.php file AND on the DB
        $company_types = Config::get('constants.company_types');
        $statuses = Config::get('constants.statuses');
        $states = Config::get('constants.states');

        return view('companies.edit', compact('company', 'company_types', 'statuses', 'notes', 'states'));
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
        /* REDIRECT USER AND CONFIRM CREATION */
        if(!$company->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Company did not update');
        } else {
            session()->flash('message', 'Company Updated Successfully');
        }
        return redirect('/companies');
    }
}
