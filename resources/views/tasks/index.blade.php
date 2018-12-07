@extends('layouts.app')

@section('content')
	Tasks - index.blade.php
	<hr>
	@foreach($tasks as $task)
		{{ $task->task }}
		<a href="tasks/{{ $task->id }}/edit">Edit task</a>
		<a href="tasks/{{ $task->id }}">Show task</a><br />
	@endforeach
	<a href="tasks/create">Create Task</a>
@endsection