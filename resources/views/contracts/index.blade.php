@extends('layouts.app')

@section('content')
	Contracts - index.blade.php
	<hr>
	@foreach($contracts as $contract)
		{{ $contract->id }}
		<a href="contracts/{{ $contract->id }}/edit">Edit contract</a>
		<a href="contracts/{{ $contract->id }}">Show contract</a><br />
	@endforeach
	<a href="contracts/create">Create contract</a>
@endsection

