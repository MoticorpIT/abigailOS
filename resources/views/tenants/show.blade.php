@extends('layouts.app')

@section('content')
	Tenants - show.blade.php || <a href="tenants/create">Create Tenant</a>
	<hr>
	<h4>Tenant Profile</h4>
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
		<li>account_standing: {{ $tenant->accountStanding->name }}</li>
		<li>status: {{ $tenant->status->name }}</li>
		<li>created_at: {{ $tenant->created_at }}</li>
		<li>updated_at: {{ $tenant->updated_at }}</li>
		<li><a href="tenants/{{ $tenant->id }}/edit">Edit tenant</a></li>
		<li><a href="/tenants">View all tenants</a></li>
	</ul>
	<hr>
	<h4>Contracts (associated)</h4>
	@foreach($contracts as $contract)
		<ul>
			<li>id: {{ $contract->id }}</li>
			<li>asset: {{ $contract->asset->name }}</li>
			<li>created_at: {{ $contract->created_at }}</li>
			<li>updated_at: {{ $contract->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Notes (associated)</h4>
	@foreach($notes as $note)
		<ul>
			<li>id: {{ $note->id }}</li>
			<li>note: {{ $note->note }}</li>
			<li>user: {{ $note->user->name }}</li>
			<li>created_at: {{ $note->created_at }}</li>
			<li>updated_at: {{ $note->updated_at }}</li>
		</ul>
	@endforeach
@endsection