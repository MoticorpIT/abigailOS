<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\UsersExport;
use App\Http\Requests\UpdatePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /** CHECK IF USER IS LOGGED IN */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Export to Excel File */
    public function export()
    {
        return Excel::download(new UsersExport, 'abigailos-users.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
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
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        /* SET TOASTR FLASH MESSAGES */
        if (!$user->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The user was saved successfully!', 'Abigail Says...');
		}

		/* REDIRECT USER AFTER SAVE */
		return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        // $avatar = auth()->user()->getFirstMedia('avatars');

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
        $user = User::findOrFail($id);

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
        if (!$user->save()) {
        	// if not saved
            toastr()->error('An error has occured please try again.', 'Abigail Says...');
        } elseif($request->status_id == 2) {
        	// if deleted
        	toastr()->success('The user was deleted successfully', 'Abigail Says...');
        } else {
        	// if edited
        	toastr()->success('The user was edited successfully!', 'Abigail Says...');
        }

        /* REDIRECT USER */
        return redirect()->route('users.show', $user);
    }


    /** SHOW FORM FOR EDITING USER PASSWORD */
    public function editPassword(User $user)
    {
        return view('users/edit-pw', compact('user'));
    }


    /** SAVE UPDATED PASSWORD TO DATABASE */
    public function updatePassword(UpdatePassword $request, User $user)
    {
        /* SAVE VALIDATED DATA TO DATABASE */
        $user->password = Hash::make(request('password'));

        /* SET TOASTER SESSION MESSAGES */
        if (!$user->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('Your password was updated successfully!', 'Abigail Says...');
		}

		/* REDIRECT USER AFTER SAVE */
        return redirect()->route('users.show', $user);
    }

}
