<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyType;
use App\Account;
use App\Asset;
use App\Note;
use App\Status;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name')->get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_types = CompanyType::all();
        $statuses = Status::where('is_active', 1)->get();
        return view('companies.create', compact('company_types', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'company_type_id' => 'required', 
            'status_id' => 'required',
        ]);
        /* CREATE NEW COMPANY */
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
                'logo' => $request->logo,
                'incorp_date' => $request->incorp_date,
                'corp_id' => $request->corp_id,
                'city_lic' => $request->city_lic,
                'county_lic' => $request->county_lic,
                'fed_tax_id' => $request->fed_tax_id,
                'company_type_id' => $request->company_type_id,
                'status_id' => $request->status_id,
            ]
        );
        /* SAVE NEW COMPANY TO DATABASE */
        $company->save();
        if (!$company->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Company did not save');
        } else {
            session()->flash('message', 'Company Created Successfully');
        }
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        $assets = Asset::where('company_id', $id)->get();
        $accounts = Account::where('company_id', $id)->get();
        $notes = Note::where('company_id', $id)->get();
        return view('companies.show', compact('company', 'assets', 'notes', 'accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company_types = CompanyType::all();
        $statuses = Status::where('is_active', 1)->get();
        return view('companies.edit', compact('company', 'company_types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
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
        /* CONFIRM CREATION AND REDIRECT USER */
        // if(!$company->save()) {
        //     session()->flash('message', 'Contact Manager. ERROR: Company did not update');
        // } else {
        //     session()->flash('message', 'Company Updated Successfully');
        // }
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
