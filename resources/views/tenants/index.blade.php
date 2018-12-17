@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				Tenants
				<a href="tenants/create" class="btn btn-primary">Create Tenant</a>
			</h1>

			<div class="tenant-table-wrapper table-responsive">
				<table class="tenant-table table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th class="id">
								ID
							</th>
							<th class="name">
								Name
							</th>
							<th class="contact">
								Contact
							</th>
							<th class="street-address">
								Street Address
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
							<th class="created-on">
								Created On
							</th>
							<th class="updated-on">
								Updated On
							</th>
							<th class="view-button">
								View
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tenants as $tenant)
						@if($tenant->status_id =='3')
							<tr class="status-{{ $tenant->status_id }}">
						@elseif($tenant->status_id =='2')
							<tr class="status-{{ $tenant->status_id }}">
						@else
						  <tr class="status-{{ $tenant->status_id }}">
						@endif
							<td class="id">
								{{ $tenant->id }}
							</td>
							<td class="name">
								<div class="item">{{ $tenant->last_name }},</div>
								<div class="item">{{ $tenant->first_name }}</div>
							</td>
							<td class="contact">
								<div class="btn-group contact-button">
								  <a href="tel:{{ $tenant->phone_1 }}" class="btn btn-secondary">
										<span><i class="fas fa-phone"></i> {{ $tenant->phone_1 }}</span>
									</a>
								  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu dropdown-menu-right">
								    <a class="dropdown-item" href="tel:{{ $tenant->phone_2 }}">
											<span><i class="fas fa-phone"></i> {{ $tenant->phone_2 }}</span>
										</a>
										<a class="dropdown-item">
											<span><i class="fas fa-fax"></i> {{ $tenant->fax }}</span>
										</a>
										<a class="dropdown-item" href="mailto:{{ $tenant->email }}">
											<span><i class="fas fa-at"></i> {{ $tenant->email }}</span>
										</a>
								  </div>
								</div> <!-- btn group -->
							</td>
							<td class="street-address">
								<div class="item">{{ $tenant->street_1 }}</div>
								<div class="item">{{ $tenant->street_2 }}</div>
							</td>
							<td class="city">
								{{ $tenant->city }}
							</td>
							<td class="state">
								{{ $tenant->state }}
							</td>
							<td class="zip">
								{{ $tenant->zip }}
							</td>
							<td class="created-on">
								{{ $tenant->created_at }}
							</td>
							<td class="updated-on">
								{{ $tenant->updated_at }}
							</td>
							<td class="view-button">
								<a href="tenants/{{ $tenant->id }}" class="btn btn-secondary">View</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->

			<style>
				.variables{display: none;}
				.variables:last-child{display: block;}
			</style>
			@foreach($tenants as $tenant)
				<ul class="variables">
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
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection
