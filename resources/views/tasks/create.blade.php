@extends('layouts.app')

@section('content')
<h1>Create a New Task</h1>

<form method="POST" action="{{ route('tasks.store') }}">
	@csrf
	@include('layouts.errors')

	<div class="form-group">
		<label>Task</label>
		<div class="input-group">
			<input type="text" class="form-control" name="task" placeholder="Task to be completed" value="{{ old('task') }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Parent Task
		</label>
		<select class="form-control" name="parent_id" value="{{ old('parent_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($tasks as $task)
				<option value="{{$task->id}}">{{ $task->task }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Task Type
		</label>
		<select class="form-control" name="task_type_id" value="{{ old('task_type_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($task_types as $key => $value)
				<option value="{{$key}}">{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Due Date</label>
		<div class="input-group">
			<input type="date" class="form-control" name="due_date" value="{{ old('due_date') }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Prioritiy
		</label>
		<select class="form-control" name="priority_id" value="{{ old('priority_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($priorities as $key => $value)
				<option value="{{$key}}">{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Repeats</label>
		<select class="form-control" name="repeats">
	        <option value="0" selected>No</option>
	        <option value="1">Yes</option>
	    </select>
	</div>

	<div class="form-group">
		<label>
			Assigned User
		</label>
		<select class="form-control" name="assigned_user_id" value="{{ old('assigned_user_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($users as $user)
				<option value="{{$user->id}}">{{ $user->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Account
		</label>
		<select class="form-control" name="account_id" value="{{ old('account_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($accounts as $account)
				<option value="{{$account->id}}">{{ $account->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Company
		</label>
		<select class="form-control" name="company_id" value="{{ old('company_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($companies as $company)
				<option value="{{$company->id}}">{{ $company->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Asset
		</label>
		<select class="form-control" name="asset_id" value="{{ old('asset_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($assets as $asset)
				<option value="{{$asset->id}}">{{ $asset->name }}</option>
			@endforeach
		</select>
	</div>

	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Task
	</button>

</form>
@endsection


