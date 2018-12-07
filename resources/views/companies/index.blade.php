@extends('layouts.app')

@section('content')
	Companies - index.blade.php
	<hr>
	@foreach($companies as $company)
		{{ $company->name }}
		<a href="companies/{{ $company->id }}/edit">Edit company</a>
		<a href="companies/{{ $company->id }}">Show company</a><br />
	@endforeach
	<a href="companies/create">Create company</a>
@endsection

