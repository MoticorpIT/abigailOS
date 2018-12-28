@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				Companies
				<a href="companies/create" class="btn btn-primary d-block-small float-right">Create Company</a>
			</h1>

			<div class="company-table-wrapper table-wrapper table-responsive">
				<table class="company-table data-table table table-striped table-hover table-bordered">
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
								Created
							</th>
							<th class="updated-on">
								Updated
							</th>
							<th class="view-button">
								View
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($companies as $company)
						@if($company->status_id =='3')
							<tr class="status-{{ $company->status_id }}">
						@elseif($company->status_id =='2')
							<tr class="status-{{ $company->status_id }}">
						@else
							<tr class="status-{{ $company->status_id }}">
						@endif
							<td class="id">
								{{ $company->id }}
							</td>
							<td class="name">
								<span class="name-span">{{ $company->name }}</span>
							</td>
							<td class="contact">
								<div class="btn-group contact-button">
									<a href="tel:{{ $company->phone_1 }}" class="btn btn-secondary">
										<span><i class="fas fa-phone"></i> {{ $company->phone_1 }}</span>
									</a>
									<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										@if($company->phone_2)
										<a class="dropdown-item" href="tel:{{ $company->phone_2 }}">
											<span><i class="fas fa-phone"></i> {{ $company->phone_2 }}</span>
										</a>
										@endif
										@if($company->fax)
										<a class="dropdown-item">
											<span><i class="fas fa-fax"></i> {{ $company->fax }}</span>
										</a>
										@endif
										@if($company->email)
										<a class="dropdown-item" href="mailto:{{ $company->email }}">
											<span><i class="fas fa-at"></i> {{ $company->email }}</span>
										</a>
										@endif
									</div>
								</div> <!-- btn group -->
							</td>
							<td class="street-address">
								<span class="item">{{ $company->street_1 }}</span>
								<span class="item">{{ $company->street_2 }}</span>
							</td>
							<td class="city">
								{{ $company->city }}
							</td>
							<td class="state">
								{{ $company->state }}
							</td>
							<td class="zip">
								{{ $company->zip }}
							</td>
							<td class="created-on">
								<span class="date">
									{{ $company->created_at->format('m/d/y') }}
								</span>
							</td>
							<td class="updated-on">
								<span class="date">
									{{ $company->updated_at->format('m/d/y h:i a') }}
								</span>
								<span class="date-readable">
									{{ $company->updated_at->diffForHumans($company->created_at) }}
								</span>
							</td>
							<td class="view-button">
								<a href="companies/{{ $company->id }}" class="btn btn-secondary">View</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> <!-- company table -->
			</div> <!-- company-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->



<div class="d-none">
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
</div>

@endsection
