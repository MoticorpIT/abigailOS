@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				Tenants
				<a href="tenants/create" class="btn btn-primary">Create Tenant</a>
			</h1>

			<div class="tenant-table-wrapper">

				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">Handle</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jacob</td>
				      <td>Thornton</td>
				      <td>@fat</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Larry</td>
				      <td>the Bird</td>
				      <td>@twitter</td>
				    </tr>
				  </tbody>
				</table>



				<table class="tenant-table">
					<thead>
						<tr>
							<th class="id">
								Tenant ID
							</th>
							<th class="first-name">
								First Name
							</th>
							<th class="last-name">
								Last Name
							</th>
							<th class="phone-1">
								Phone 1
							</th>
							<th class="phone-2 d-md-none">
								Phone 2
							</th>
							<th class="fax">
								Fax
							</th>
							<th class="email">
								Email
							</th>
							<th class="street-address-1">
								Street Address 1
							</th>
							<th class="street-address-2">
								Street Address 2
							</th>
							<th class="city">
								City
							</th>
							<th class="state">
								state
							</th>
							<th class="zip">
								zip
							</th>
							<th class="account-standing">
								Account Standing
							</th>
							<th class="status">
								Status
							</th>
							<th class="created-on">
								Created On
							</th>
							<th class="updated-on">
								Updated On
							</th>
							<th class="view-button">
								View Button
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="id">
								Tenant ID
							</td>
							<td class="first-name">
								First Name
							</td>
							<td class="last-name">
								Last Name
							</td>
							<td class="phone-1">
								Phone 1
							</td>
							<td class="phone-2 d-md-none">
								Phone 2
							</td>
							<td class="fax">
								Fax
							</td>
							<td class="email">
								Email
							</td>
							<td class="street-address-1">
								Street Address 1
							</td>
							<td class="street-address-2">
								Street Address 2
							</td>
							<td class="city">
								City
							</td>
							<td class="state">
								state
							</td>
							<td class="zip">
								zip
							</td>
							<td class="account-standing">
								Account Standing
							</td>
							<td class="status">
								Status
							</td>
							<td class="created-on">
								Created On
							</td>
							<td class="updated-on">
								Updated On
							</td>
							<td class="view-button">
								View Button
							</td>
						</tr>
					</tbody>
				</table>
			</div> <!-- tenant-table-wrapper -->
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->
	Tenants - index.blade.php
	<hr>

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
			<li>account_standing: {{ $tenant->accountStanding->name }}</li>
			<li>status: {{ $tenant->status->name }}</li>
			<li>created_at: {{ $tenant->created_at }}</li>
			<li>updated_at: {{ $tenant->updated_at }}</li>
			<li><a href="tenants/{{ $tenant->id }}/edit">Edit tenant</a></li>
			<li><a href="tenants/{{ $tenant->id }}">Show tenant</a></li>
		</ul>
	@endforeach
@endsection
