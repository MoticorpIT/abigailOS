@extends('layouts.app')

@section('content')

<h1>Task Profile</h1>

@include('layouts.errors')

<div class="form-group">
	<label>Task</label>
	<div class="input-group">
		<input type="text" class="form-control" name="task" placeholder="Task to be completed" value="{{ $task->task }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>Due Date</label>
	<div class="input-group">
		<input type="text" class="form-control" name="due_date" placeholder="Date task should be completed" value="{{ $task->due_date }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>Repeats</label>
	<select class="form-control" name="repeats" disabled read-only>
        <option value="0" {{ $task->repeats != 1 ? 'selected' : '' }}>No</option>
        <option value="1" {{ $task->repeats == 1 ? 'selected' : '' }}>Yes</option>
    </select>
</div>

<div class="form-group">
	<label>
		Assigned User
	</label>
	<select class="form-control" name="assigned_user_id" disabled read-only>
		<option value="{{$task->assigned_user_id}}">{{ $task->user->name ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Account
	</label>
	<select class="form-control" name="account_id" disabled read-only>
		<option value="{{$task->account_id}}">{{ $task->account->name ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Company
	</label>
	<select class="form-control" name="company_id" disabled read-only>
		<option value="{{$task->company_id}}">{{ $task->company->name ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Asset
	</label>
	<select class="form-control" name="asset_id" disabled read-only>
		<option value="{{$task->asset_id}}">{{ $task->asset->name ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Parent Task
	</label>
	<select class="form-control" name="task_id" disabled read-only>
		<option value="{{$task->task_id}}">{{ $task->parent_task->task ?? 'NA' }}</option>
	</select>
</div>

{{-- @if ($task->task_id)
	<div class="form-group">
	<label>
		Sub Tasks
	</label>
	<select class="form-control" name="task_id" disabled read-only>
		@foreach($sub_tasks as $sub_task)
			<option value="{{$sub_task->id}}">{{ $sub_task->task ?? 'NA' }}</option>
		@endforeach
	</select>
</div>
@endif --}}

<div class="form-group">
	<label>
		Task Type
	</label>
	<select class="form-control" name="task_type_id" disabled read-only>
		<option value="{{$task->task_type_id}}">{{ $task->task_type->name }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Prioritiy
	</label>
	<select class="form-control" name="priority_id" disabled read-only>
		<option value="{{$task->priority_id}}">{{ $task->priority->name }}</option>
	</select>
</div>

<a href="/tasks/{{$task->id}}/edit" id="submit-btn" type="submit" class="btn">
	Edit Task
</a>

@endsection

