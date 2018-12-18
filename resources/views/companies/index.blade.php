@extends('layouts.app')

@section('content')
	Companies - index.blade.php || <a href="/companies/create">Create company</a>
	<hr>
	@foreach($companies as $company)
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
			<li><a href="companies/{{ $company->id }}/edit">Edit company</a></li>
			<li><a href="companies/{{ $company->id }}">Show company</a></li>
		</ul>
	@endforeach

@endsection

