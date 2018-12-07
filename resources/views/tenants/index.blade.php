@extends('layouts.app')

@section('content')
	Tenants - index.blade.php
	<hr>
	@foreach($tenants as $tenant)
		{{ $tenant->first_name }} {{ $tenant->last_name }}
		<a href="tenants/{{ $tenant->id }}/edit">Edit tenant</a>
		<a href="tenants/{{ $tenant->id }}">Show tenant</a><br />
	@endforeach
	<a href="tenants/create">Create Tenant</a>
@endsection