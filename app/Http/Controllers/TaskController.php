<?php

namespace App\Http\Controllers;

use App\Account;
use App\Asset;
use App\Company;
use App\Http\Requests\TaskRequest;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Config;

class TaskController extends Controller
{
	// Check if User is Logged In
	public function __construct()
	{
		$this->middleware('auth');
	}


	// Show all Tasks (table)
	public function index()
	{
		$tasks = Task::with(['priority', 'taskType'])
			->where('parent_id', null)
			->orderBy('priority_id', 'desc')
			->orderBy('due_date')
			->get();
		return view('tasks.index', compact('tasks'));
	}


	// Task Create Form (view)
	public function create()
	{
		// Database Queries
		$tasks = Task::all(); // for parent/child association
		$users = User::active()->get();
		$accounts = Account::active()->get();
		$companies = Company::active()->get();
		$assets = Asset::active()->get();

		// Config/Constants.php 'Queries'
		// Changes need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

		return view('tasks.create', compact('tasks', 'accounts', 'companies', 'assets', 'task_types', 'priorities', 'users'));
	}


	// Store a New Task
	public function store(TaskRequest $request)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Create Task
		$task = Task::create($validData);

		// Save the Task
		$task->save();

		// If Subtask (ajax)
		if ($request->ajax()) {

			$subid = $task->id;
			$subtask = $task->task;

			return response()->json([$task, $subid, $subtask]);

		} else {

			if(!$task->save()) {
				toastr()->error('An error has occured please try again.', 'Abigail Says...');
			} else {
				toastr()->success('The task was saved successfully!', 'Abigail Says...');
			}

			return redirect()->route('tasks.show', $task);

		}
	}


	// Show One Task
	public function show($id)
	{
		// Database Queries
		$task = Task::with(['priority', 'taskType'])->findOrFail($id);
		$sub_tasks = Task::where('parent_id', $task->id)->get();
		$users = User::active()->get();

		// Config/Constants.php 'Queries'
		// Changes need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

		return view('tasks.show', compact('task', 'sub_tasks', 'users', 'task_types', 'priorities'));
	}


	// Task Edit Form (view)
	public function edit(Task $task)
	{
		// Database Queries
		$tasks = Task::all(); // for parent/child association
		$accounts = Account::active()->get();
		$companies = Company::active()->get();
		$assets = Asset::active()->get();
		$users = User::active()->get();

		// Config/Constants.php 'Queries'
		// Changes need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

		return view('tasks.edit', compact('task', 'tasks', 'accounts', 'companies', 'assets', 'task_types', 'priorities', 'users'));
	}


	// Update an Existing Task
	public function update(TaskRequest $request, Task $task)
	{
		// Validate Data from Form
		$validData = $request->validated();

		// Fill and Save new Task
		$task->fill($validData);
		$task->save();

		// Set Notifications
		if (!$task->save()) {
			// if not saved
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			// if edited
			toastr()->success('Your task was edited successfully!', 'Abigail Says...');
		}

		// Redirect
		return redirect()->route('tasks.show', $task);
	}
}
