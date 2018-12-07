@extends('layouts.app')

@section('content')
	Accounts - index.blade.php
	<hr>
	@foreach($accounts as $account)
		{{ $account->name }}
		<a href="accounts/{{ $account->id }}/edit">Edit account</a>
		<a href="accounts/{{ $account->id }}">Show account</a><br />
	@endforeach
	<a href="accounts/create">Create account</a>
@endsection

