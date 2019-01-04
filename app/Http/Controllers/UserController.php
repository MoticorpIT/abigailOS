<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePassword;

class UserController extends Controller
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
        $users = User::orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);
        /* CREATE AND SAVE NEW USER TO DATABASE */
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);
        /* REDIRECT USER AFTER SAVE */
        session()->flash('message', 'User Added Successfully');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_active' => 'required|boolean'
        ]);
        /* SAVE VALIDATED DATA TO DATABASE */
        $user->fill([
            'name' => request('name'),
            'email' => request('email'),
            'is_active' => request('is_active')
        ])->save();
        /* CONFIRM UPDATE AND REDIRECT USER */
        if(!$user->save()) {
            session()->flash('message', 'Contact Manager. ERROR: User did not update');
        } else {
            session()->flash('message', 'User Updated Successfully');
        }
        /* REDIRECT USER */
        return redirect('users');
    }

}
