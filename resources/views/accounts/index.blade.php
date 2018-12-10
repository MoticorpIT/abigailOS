@extends('layouts.app')

@section('content')
	Accounts - index.blade.php
	<hr>
	<a href="accounts/create">Create account</a>
	@foreach($accounts as $account)
		<ul>
			<li>name: {{ $account->name }}</li>
			<li>acct_num: {{ $account->acct_num }}</li>
			<li>url: {{ $account->url }}</li>
			<li>street_1: {{ $account->street_1 }}</li>
			<li>street_2: {{ $account->street_2 }}</li>
			<li>city: {{ $account->city }}</li>
			<li>state: {{ $account->state }}</li>
			<li>zip: {{ $account->zip }}</li>
			<li>phone_1: {{ $account->phone_1 }}</li>
			<li>phone_2: {{ $account->phone_2 }}</li>
			<li>fax: {{ $account->fax }}</li>
			<li>email: {{ $account->email }}</li>
			<li>contact_name: {{ $account->contact_name }}</li>
			<li>contact_phone_1: {{ $account->contact_phone_1 }}</li>
			<li>contact_phone_2: {{ $account->contact_phone_2 }}</li>
			<li>contact_email: {{ $account->contact_email }}</li>
			<li>account_type_id: {{ $account->account_type_id }}</li>
			<li>company_id: {{ $account->company_id }}</li>
			<li>asset_id: {{ $account->asset_id }}</li>
			<li>status_id: {{ $account->status_id }}</li>
			<li>created_at: {{ $account->created_at }}</li>
			<li>updated_at: {{ $account->updated_at }}</li>
			<li><a href="accounts/{{ $account->id }}/edit">Edit account</a></li>
			<li><a href="accounts/{{ $account->id }}">Show account</a></li>
		</ul>
	@endforeach
@endsection

