@extends('layouts.app')

@section('content')
	Tenants - index.blade.php
	<hr>
	<a href="tenants/create">Create Tenant</a>
	@foreach($tenants as $tenant)
		<ul>
			<li>id: {{ $tenant->id }}</li>
			<li>first name: {{ $tenant->first_name }}</li>
			<li>last name: {{ $tenant->last_name }}</li>
			<li>phone_1: {{ $tenant->phone_1 }}</li>
			<li>phone_2: {{ $tenant->phone_2 }}</li>
			<li>fax: {{ $tenant->fax }}</li>
			<li>email: {{ $tenant->email }}</li>
			<li>co_first_name: {{ $tenant->co_first_name }}</li>
			<li>co_last_name: {{ $tenant->co_last_name }}</li>
			<li>co_phone_1: {{ $tenant->co_phone_1 }}</li>
			<li>co_phone_2: {{ $tenant->co_phone_2 }}</li>
			<li>co_email: {{ $tenant->co_email }}</li>
			<li>street_1: {{ $tenant->street_1 }}</li>
			<li>street_2: {{ $tenant->street_2 }}</li>
			<li>city: {{ $tenant->city }}</li>
			<li>state: {{ $tenant->state }}</li>
			<li>zip: {{ $tenant->zip }}</li>
			<li>account_standing_id: {{ $tenant->account_standing_id }}</li>
			<li>status_id: {{ $tenant->status_id }}</li>
			<li>created_at: {{ $tenant->created_at }}</li>
			<li>updated_at: {{ $tenant->updated_at }}</li>
			<li><a href="tenants/{{ $tenant->id }}/edit">Edit tenant</a></li>
			<li><a href="tenants/{{ $tenant->id }}">Show tenant</a></li>
		</ul>
	@endforeach
@endsection