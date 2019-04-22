@extends('layouts.app')

@section('content')
<h1>Edit a Task</h1>

<form method="POST" action="/tasks/{{ $task->id }}">
	@csrf @method('PATCH')
	@include('layouts.errors')

	<div class="form-group">
		<label>Task</label>
		<div class="input-group">
			<input type="text" class="form-control" name="task" value="{{ $task->task }}">
		</div>
	</div>

	<div class="form-group">
		<label>Due Date</label>
		<div class="input-group">
			<input type="date" class="form-control" name="due_date" value="{{ cleanDatePicker($task->due_date) }}">
		</div>
	</div>

	<div class="form-group">
		<label>Repeats</label>
		<select class="form-control" name="repeats">
	        <option value="0" {{ $task->repeats != 1 ? 'selected' : '' }}>No</option>
	        <option value="1" {{ $task->repeats == 1 ? 'selected' : '' }}>Yes</option>
	    </select>
	</div>

	<div class="form-group">
		<label>
			Assigned User
		</label>
		<select class="form-control" name="assigned_user_id" value="{{ $task->assigned_user_id }}">
			@foreach ($users as $user)
				<option value="{{$user->id}}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Account
		</label>
		<select class="form-control" name="account_id" value="{{ $task->account_id }}">
			@if($task->account_id == null)
				<option value="" selected>None</option>
				@foreach ($accounts as $account)
					<option value="{{$account->id}}">{{ $account->name }}</option>
				@endforeach
			@else
				<option value="">None</option>
				@foreach ($accounts as $account)
					<option value="{{$account->id}}" {{ $task->account_id == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
				@endforeach
			@endif
		</select>
	</div>

	<div class="form-group">
		<label>
			Company
		</label>
		<select class="form-control" name="company_id" value="{{ $task->company_id }}">
			@if($task->company_id == null)
				<option value="" selected>None</option>
				@foreach ($companies as $company)
					<option value="{{$company->id}}">{{ $company->name }}</option>
				@endforeach
			@else
				<option value="">None</option>
				@foreach ($companies as $company)
					<option value="{{$company->id}}" {{ $task->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
				@endforeach
			@endif
		</select>
	</div>

	<div class="form-group">
		<label>
			Asset
		</label>
		<select class="form-control" name="asset_id" value="{{ $task->asset_id }}">
			@if($task->asset_id == null)
				<option value="" selected="">None</option>
				@foreach ($assets as $asset)
					<option value="{{$asset->id}}">{{ $asset->name }}</option>
				@endforeach
			@else
				<option value="">None</option>
				@foreach ($assets as $asset)
					<option value="{{$asset->id}}" {{ $task->asset_id == $asset->id ? 'selected' : '' }}>{{ $asset->name }}</option>
				@endforeach
			@endif
		</select>
	</div>

	<div class="form-group">
		<label>
			Tasks
		</label>
		<select class="form-control" name="task_id" value="{{ $task->task_id }}">
			@foreach ($tasks as $task)
				<option value="{{$task->id}}" {{ $task->task_id == $task->id ? 'selected' : '' }}>{{ $task->task }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Task Type
		</label>
		<select class="form-control" name="task_type_id" value="{{ $task->task_type_id }}">
			@foreach ($task_types as $key => $value)
				<option value="{{$key}}" {{ $task->task_type_id == $key ? 'selected' : '' }}>{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Prioritiy
		</label>
		<select class="form-control" name="priority_id" value="{{ $task->priority_id }}">
			@foreach ($priorities as $key => $value)
				<option value="{{$key}}" {{ $task->priority_id == $key ? 'selected' : '' }}>{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Task
	</button>

</form>
@endsection

