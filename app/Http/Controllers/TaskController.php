<?php

namespace App\Http\Controllers;

use App\Task;
use App\Account;
use App\Asset;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TaskController extends Controller
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
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// DATABASE QUERIES
    	$tasks = Task::all();
    	$users = User::active()->get();
    	$accounts = Account::active()->get();
    	$companies = Company::active()->get();
    	$assets = Asset::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

        return view('tasks.create', compact('tasks', 'accounts', 'companies', 'assets', 'task_types', 'priorities', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* VALIDATE THE REQUEST */
		$this->validate(request(), [
			'task' => 'required',
			'due_date' => 'required',
			'repeats' => 'required',
			'assigned_user_id' => 'required',
			'account_id' => 'nullable',
			'company_id' => 'nullable',
			'asset_id' => 'nullable',
			'task_id' => 'nullable',
			'task_type_id' => 'nullable',
			'priority_id' => 'nullable',
		]);
		/* CREATE THE TASK */
		$task = new Task(
			[
				'task' => $request->task,
				'due_date' => $request->due_date,
				'repeats' => $request->repeats,
				'assigned_user_id' => $request->assigned_user_id,
				'account_id' => $request->account_id,
				'company_id' => $request->company_id,
				'asset_id' => $request->asset_id,
				'task_id' => $request->task_id,
				'task_type_id' => $request->task_type_id,
				'priority_id' => $request->priority_id,
			]
		);
		/* SAVE THE TASK */
		$task->save();
		/* SET NOTIFICATIONS */
		if(!$task->save()) {
			toastr()->error('An error has occured please try again.', 'Abigail Says...');
		} else {
			toastr()->success('The task was saved successfully!', 'Abigail Says...');
		}
		/* REDIRECT */
		return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	// DATABASE QUERIES
    	$task = Task::findOrFail($id);
    	$sub_tasks = Task::with('sub_tasks')->where('task_id',$id)->get();
    	$users = User::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

        return view('tasks.show', compact('task', 'sub_tasks', 'users', 'task_types', 'priorities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// DATABASE QUERIES
    	$task = Task::findOrFail($id);
    	$tasks = Task::all();
    	$accounts = Account::active()->get();
    	$companies = Company::active()->get();
    	$assets = Asset::active()->get();
    	$users = User::active()->get();

    	// CONFIG/CONSTANTS.PHP 'QUERIES'
		// If either need to be changed, they need to be changed in the constants.php file AND on the DB
		$task_types = Config::get('constants.task_types');
		$priorities = Config::get('constants.priorities');

        return view('tasks.edit', compact('task', 'tasks', 'accounts', 'companies', 'assets', 'task_types', 'priorities', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        /* VALIDATE DATA FROM FORM */
		$data = $request->validate([
			'task' => 'required',
			'due_date' => 'required',
			'repeats' => 'required',
			'assigned_user_id' => 'required',
			'account_id' => 'nullable',
			'company_id' => 'nullable',
			'asset_id' => 'nullable',
			'task_id' => 'nullable',
			'task_type_id' => 'nullable',
			'priority_id' => 'nullable',
		]);
		
		/* FILL DATA AND SAVE */
		$task->fill($data);
		$task->save();
		
		/* CREATE FLASH MESSAGES */
		if (!$task->save()) {
        	// if not saved
            toastr()->error('An error has occured please try again.', 'Abigail Says...');
        } else {
        	// if edited
        	toastr()->success('Your task was edited successfully!', 'Abigail Says...');
        }
		
		/* REDIRECT USER */
		return redirect('tasks');
    }
}
