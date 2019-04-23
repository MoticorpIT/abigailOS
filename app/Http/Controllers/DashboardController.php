<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function show()
	{
		$tasks = Task::where('is_complete', 0)
			->orderBy('priority_id', 'desc')
			->orderBy('due_date')
			->paginate(10);
		$overdueCount = Task::where('priority_id',3)->count();

		return view('dashboard', compact('tasks', 'overdueCount'));
	}
}
