<?php

namespace App\Http\Controllers;

use App\Repeat;
use Illuminate\Http\Request;

class RepeatController extends Controller
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
     * @param  \App\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function show(Repeat $repeat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function edit(Repeat $repeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repeat $repeat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repeat $repeat)
    {
        //
    }
}
