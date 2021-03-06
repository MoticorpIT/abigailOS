@extends('layouts.app')

@section('ajax-scripts')
  <script src="{{ asset('/js/ajax.js') }}"></script>
@endsection

@section('content')

<h1>Task Profile</h1>

<a href="{{ route('tasks.edit', $task) }}" id="submit-btn" type="submit" class="btn mb-4">
	Edit Task
</a>

@include('layouts.errors')

<div class="form-group">
	<label>Task</label>
	<div class="input-group">
		<input type="text" class="form-control" name="task" placeholder="Task to be completed" value="{{ $task->task }}" disabled read-only>
	</div>
</div>

<div class="form-group row">
	<div class="col-6">
		<label>
			Sub-Tasks
		</label>
		<ul id="sub-task-block">
			@foreach($sub_tasks as $sub_task)
				<li><a href="{{ route('tasks.show', $sub_task) }}">{{ $sub_task->task }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-6">
		<a href="#0" class="badge badge-primary float-right add-task-link" data-toggle="modal" data-target="#add-task-modal">Add Sub Task</a>
	</div>
</div>

<div class="form-group">
	<label>
		Parent Task
	</label>
	<select class="form-control" name="parent_id" disabled read-only>
		<option value="{{$task->parent_id}}">{{ $task->main_task->task ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Task Type
	</label>
	<select class="form-control" name="task_type_id" disabled read-only>
		<option value="{{$task->task_type_id ?? ''}}">{{ $task->taskType->name ?? 'NA' }}</option>
	</select>
</div>

<div class="form-group">
	<label>Due Date</label>
	<div class="input-group">
		<input type="text" class="form-control" name="due_date" placeholder="Date task should be completed" value="{{ cleanDate($task->due_date) }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>
		Prioritiy
	</label>
	<select class="form-control" name="priority_id" disabled read-only>
		<option value="{{$task->priority_id ?? ''}}">{{ $task->priority->name ?? 'NA' }}</option>
	</select>
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

@include('layouts/modals/task-add-subtask')
@endsection

