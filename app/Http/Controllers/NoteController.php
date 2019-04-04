<?php

namespace App\Http\Controllers;

use App\Note;
use App\Http\Requests\NoteRequest;

use Illuminate\Http\Request;

class NoteController extends Controller
{

	// Store New Note
	/** Notes are created from: 
		- companies.show
		- assets.show
		- accounts.show
		- tenants.show */
	public function store(NoteRequest $request)
	{
		// Validate Form Data
		$validData = $request->validated();

		// Create the New Note
		$note = Note::create($validData);

		// Save the Note
		$note->save();

		// Set variables that get returned to ajax success
		$user = $note->user->name;
		$time = $note->created_at->diffForHumans();
		if (isset($note->user->avatar_id)) {
			$img = $note->user->avatar->getURL('thumb');
		} else {
			$img = '/media/images/user-default-avatar-thumb.png';
		}

		// Send Response
		return response()->json([$note, $user, $time, $img]);
	}


	// Update an Existing Note
	/** Notes are edited from: 
		- companies.show
		- assets.show
		- accounts.show
		- tenants.show */
	public function update(NoteRequest $request, Note $note)
	{
		// Validate Form Data
		$validData = $request->validated();

		// Fill and Save the Note
		$note->fill($validData);
		$note->save();

		// Set NOtifications
		if (!$note->save()) {
			// if not saved
			toastr()->error('An error has occurred please try again.', 'Abigail Says...');
		} elseif($request->status_id == 2) { 
			// if deleted
			toastr()->success('Your note was deleted successfully', 'Abigail Says...');
		} else {
			// if edited
			toastr()->success('Your note was edited successfully!', 'Abigail Says...');
		}

		// Send Response
		return response()->json($note);
	}

}