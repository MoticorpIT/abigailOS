@extends('layouts.app')

@section('content')
	Companies - show.blade.php || <a href="companies/create">Create company</a>
	<hr>
	<h4>Company Profile</h4>
	<ul>
		<li>id: {{ $company->id }}</li>
		<li>name: {{ $company->name }}</li>
		<li>street_1: {{ $company->street_1 }}</li>
		<li>street_2: {{ $company->street_2 }}</li>
		<li>city: {{ $company->city }}</li>
		<li>state: {{ $company->state }}</li>
		<li>zip: {{ $company->zip }}</li>
		<li>phone_1: {{ $company->phone_1 }}</li>
		<li>phone_2: {{ $company->phone_2 }}</li>
		<li>fax: {{ $company->fax }}</li>
		<li>email: {{ $company->email }}</li>
		<li>logo: {{ $company->logo }}</li>
		<li>incorp_date: {{ $company->incorp_date }}</li>
		<li>corp_id: {{ $company->corp_id }}</li>
		<li>city_lic: {{ $company->city_lic }}</li>
		<li>county_lic: {{ $company->county_lic }}</li>
		<li>fed_tax_id: {{ $company->fed_tax_id }}</li>
		<li>company_type: {{ $company->companyType->name }}</li>
		<li>status: {{ $company->status->name}}</li>
		<li>created_at: {{ $company->created_at }}</li>
		<li>updated_at: {{ $company->updated_at }}</li>
		<li><a href="/companies/{{ $company->id }}/edit">Edit company</a></li>
		<li><a href="/companies">View all companies</a></li>
	</ul>
	<hr>
	<h4>Assets (associated)</h4>
	@foreach($assets as $asset)
		<ul>
			<li>id: {{ $asset->id }}</li>
			<li>name: {{ $asset->name }}</li>
			<li>created_at: {{ $asset->created_at }}</li>
			<li>updated_at: {{ $asset->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Accounts (associated)</h4>
	@foreach($accounts as $account)
		<ul>
			<li>id: {{ $account->id }}</li>
			<li>name: {{ $account->name }}</li>
			<li>created_at: {{ $account->created_at }}</li>
			<li>updated_at: {{ $account->updated_at }}</li>
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

