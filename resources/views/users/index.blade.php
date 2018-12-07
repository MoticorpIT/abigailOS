@extends('layouts.app')

@section('content')
	Users - index.blade.php
	<hr>
	@foreach($users as $user)
		{{ $user->name }}
		<a href="users/{{ $user->id }}/edit">Edit User</a>
		<a href="users/{{ $user->id }}">Show User</a><br />
	@endforeach
	<a href="users/create">Create User</a>
@endsection