<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    /** SAVE A NEWLY CREATED NOTE */
    /** Notes are created from: 
        - companies.show
        - assets.show
        - accounts.show
        - tenants.show */
    public function store(Request $request)
    {
         /* VALIDATE DATA COMING IN FROM FORM */
        $this->validate(request(), [
            'note' => 'required',
            'company_id' => 'nullable', 
            'account_id' => 'nullable',
            'asset_id' => 'nullable', 
            'tenant_id' => 'nullable', 
            'user_id' => 'required',
            'edited_by_user_id' => 'nullable',
            'status_id' => 'required'
        ]);
        /* CREATE THE NEW COMPANY */
        $note = new Note(
            [
                'note' => $request->note,
                'company_id' => $request->company_id,
                'account_id' => $request->account_id,
                'asset_id' => $request->asset_id,
                'tenant_id' => $request->tenant_id,
                'user_id' => $request->user_id,
                'edited_by_user_id' => $request->edited_by_user_id,
                'status_id' => $request->status_id
            ]
        );
        /* SAVE THE NEW COMPANY TO DATABASE */
        $note->save();
        if (!$note->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Note did not save');
        } else {
            session()->flash('message', 'Note Saved Successfully');
        }
        return response()->json($note);
    }

    /** UPDATE AN EXISTING NOTE */
    /** Notes are edited from: 
        - companies.show
        - assets.show
        - accounts.show
        - tenants.show */
    public function update(Request $request, Note $note)
    {
        /* VALIDATE DATA COMING IN FROM FORM */
        $this->validate(request(), [
            'note' => 'required',
            'company_id' => 'nullable', 
            'account_id' => 'nullable',
            'asset_id' => 'nullable', 
            'tenant_id' => 'nullable', 
            'user_id' => 'required',
            'edited_by_user_id' => 'nullable',
            'status_id' => 'required'    
        ]);
        /* CREATE UPDATED ITEM */
        $note->update( [
            'note' => $request->note,
            'company_id' => $request->company_id,
            'account_id' => $request->account_id,
            'asset_id' => $request->asset_id,
            'tenant_id' => $request->tenant_id,
            'user_id' => $request->user_id,
            'edited_by_user_id' => $request->edited_by_user_id,
            'status_id' => $request->status_id,
        ]);
        /* REDIRECT USER AND CONFIRM CREATION */
        if(!$note->save()) { 
        	// if not saved
        	session()->flash('message', 'Contract Manager. ERROR: Note did not update');
        } elseif($request->status_id == 2) { 
        	// if deleted
        	session()->flash('message', 'Note Deleted Successfully');
        } else { 
        	// if edited
        	session()->flash('message', 'Note Updated Successfully');
        }
        /* RETURN THE RESPONSE - AS JSON */
        return response()->json($note);
    }

}