<?php

namespace App\Http\Controllers;

use App\Tenant;
use App\Contract;
use App\Note;
use App\AccountStanding;
use App\Status;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /** CHECK IF USER IS LOGGED IN */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $account_standings = AccountStanding::all();
        return view('tenants.create', compact('statuses', 'account_standings'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'co_first_name' => 'nullable',
            'co_last_name' => 'nullable',
            'co_phone_1' => 'nullable',
            'co_phone_2' => 'nullable',
            'co_email' => 'nullable',
            'street_1' => 'required',
            'street_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);
        /* CREATE THE NEW TENANT */
        $tenant = new Tenant(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'fax' => $request->fax,
                'email' => $request->email,
                'co_first_name' => $request->co_first_name,
                'co_last_name' => $request->co_last_name,
                'co_phone_1' => $request->co_phone_1,
                'co_phone_2' => $request->co_phone_2,
                'co_email' => $request->co_email,
                'street_1' => $request->street_1,
                'street_2' => $request->street_2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]
        );
        /* SAVE THE NEW COMPANY TO DATABASE */
        $tenant->save();
        if (!$tenant->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Tenant did not save');
        } else {
            session()->flash('message', 'Tenant Created Successfully');
        }
        return redirect('/tenants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);
        $notes = Note::where('tenant_id', $id)->get();
        $contracts = Contract::where('tenant_id', $id)->get();
        return view('tenants.show', compact('tenant', 'notes', 'contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        $notes = Note::where('tenant_id', $id)->get();
        $contracts = Contract::where('tenant_id', $id)->get();
        $statuses = Status::all();
        $account_standings = AccountStanding::all();
        return view('tenants.edit', compact('tenant','notes','statuses','account_standings', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'co_first_name' => 'nullable',
            'co_last_name' => 'nullable',
            'co_phone_1' => 'nullable',
            'co_phone_2' => 'nullable',
            'co_email' => 'nullable',
            'street_1' => 'required',
            'street_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'account_standing_id' => 'required',
            'status_id' => 'required',
        ]);
         /* SAVE VALIDATED DATA TO DATABASE */
        $tenant->fill($data);
        $tenant->save();
        /* REDIRECT USER AND CONFIRM CREATION */
        if(!$tenant->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Tenant did not update');
        } else {
            session()->flash('message', 'Tenant Updated Successfully');
        }
        return redirect('/tenants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
