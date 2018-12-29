<?php

namespace App\Http\Controllers;

use App\AccountStanding;
use Illuminate\Http\Request;

class AccountStandingController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountStanding  $accountStanding
     * @return \Illuminate\Http\Response
     */
    public function show(AccountStanding $accountStanding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountStanding  $accountStanding
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountStanding $accountStanding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountStanding  $accountStanding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountStanding $accountStanding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountStanding  $accountStanding
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountStanding $accountStanding)
    {
        //
    }
}
