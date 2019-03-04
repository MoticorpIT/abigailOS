@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-building"></i>
				Companies
				<a href="/companies/create" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-plus-square"></i>
					Create Company
				</a>
				<a href="/companies/export" class="btn d-block-small float-right">
					<i class="fas fa-file-download"></i>
					Download
				</a>
			</h1>

			<div class="company-table-wrapper table-wrapper table-responsive">
				<table class="company-table data-table table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="name all">
								Name
							</th>
							<th class="id none">
								ID
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
								State
							</th>
							<th class="zip">
								Zip
							</th>
							<th class="created-on none">
								Created
							</th>
							<th class="updated-on none">
								Updated
							</th>
							<th class="view-button not-mobile-p">
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
							<td class="name all">
								<span class="name-span">{{ $company->name }}</span>
							</td>
							<td class="id none">
								{{ $company->id }}
							</td>
							<td class="contact">
								<div class="btn-group contact-button">
									<a href="tel:{{ $company->phone_1 }}" class="btn btn-secondary">
										<span><i class="fas fa-phone"></i> {{ cleanPhone($company->phone_1) }}</span>
									</a>
									<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										@if($company->phone_2)
										<a class="dropdown-item" href="tel:{{ $company->phone_2 }}">
											<span><i class="fas fa-phone"></i> {{ cleanPhone($company->phone_2) }}</span>
										</a>
										@endif
										@if($company->fax)
										<a class="dropdown-item">
											<span><i class="fas fa-fax"></i> {{ cleanPhone($company->fax) }}</span>
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
							<td class="created-on none">
								<span class="date">
									{{ $company->created_at->format('m/d/y') ?? '' }}
								</span>
							</td>
							<td class="updated-on none">
								<span class="date">
									{{ $company->updated_at != null ? $company->updated_at->format('m/d/y h:i a') : '' }}
								</span>
								<span class="date-readable">
									{{ $company->updated_at != null ? $company->updated_at->diffForHumans($company->created_at) : '' }}
								</span>
							</td>
							<td class="view-button not-mobile-p">
								<a href="/companies/{{ $company->id }}" class="btn btn-secondary btn-sm view-link"><i class="fas fa-eye"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> <!-- company table -->
			</div> <!-- company-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->


@endsection
