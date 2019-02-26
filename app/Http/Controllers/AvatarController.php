<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
	// USER AUTH CHECK - Login Required
    public function __construct()
    {
        $this->middleware('auth');
    }

    // STORE AVATAR
    public function store(Request $request)
    {
        return $request->all();
    }

    // UPDATE AVATAR
    public function update()
    {
        //
    }
}
