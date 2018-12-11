@extends('layouts.app')

@section('content')
	Accounts - show.blade.php || <a href="accounts/create">Create account</a>
	<hr>
	<h4>Account Profile</h4>
	<ul>
		<li>id: {{ $account->id }}</li>
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
		<li>account_type: {{ $account->accountType->name }}</li>
		<li>company: {{ $account->company->name }}</li>
		<li>asset: {{ $account->asset->name }}</li>
		<li>status: {{ $account->status->name }}</li>
		<li>created_at: {{ $account->created_at }}</li>
		<li>updated_at: {{ $account->updated_at }}</li>
		<li><a href="/accounts/{{ $account->id }}/edit">Edit account</a></li>
		<li><a href="/accounts">View all accounts</a></li>
	</ul>
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

