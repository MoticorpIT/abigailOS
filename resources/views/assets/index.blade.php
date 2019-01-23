@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-briefcase"></i> Assets
				<a href="/assets/create" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-plus-square"></i>
					Create Asset
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
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
								Address
							</th>
							<th class="type">
								Type
							</th>
							<th class="company">
								Company
							</th>
							<th class="rent">
								Rent
							</th>
							<th class="deposit">
								Deposit
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
						@foreach($assets->sortBy('name') as $asset)
						<tr class="status-{{ $asset->status_id }}">
							<td class="name all">
								<span class="name">{{ $asset->name }}</span>
							</td>
							<td class="id none">
								{{ $asset->id }}
							</td>
							<td class="contact">
								<div class="btn-group contact-button">
								  <a href="tel:{{ $asset->phone_1 }}" class="btn btn-secondary">
										<span><i class="fas fa-phone"></i> {{ $asset->phone_1 }}</span>
									</a>
								  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu dropdown-menu-right">
										@if($asset->phone_2)
								    <a class="dropdown-item" href="tel:{{ $asset->phone_2 }}">
											<span><i class="fas fa-phone"></i> {{ $asset->phone_2 }}</span>
										</a>
										@endif
										@if($asset->fax)
										<a class="dropdown-item">
											<span><i class="fas fa-fax"></i> {{ $asset->fax }}</span>
										</a>
										@endif
										@if($asset->email)
										<a class="dropdown-item" href="mailto:{{ $asset->email }}">
											<span><i class="fas fa-at"></i> {{ $asset->email }}</span>
										</a>
										@endif
								  </div>
								</div> <!-- btn group -->
							</td>
							<td class="street-address">
								<div>
									<span class="item">{{ $asset->street_1 }}</span>
									<span class="item">{{ $asset->street_2 }}</span>
								</div>
								<div>
									{{ $asset->city }}, {{ $asset->state }} {{ $asset->zip }}
								</div>
							</td>
							<td class="type">
								{{ $asset->assetType->name }}
							</td>
							<td class="company">
								{{ $asset->company->name }}
							</td>
							<td class="rent">
								${{ $asset->rent }}
							</td>
							<td class="deposit">
								${{ $asset->deposit }}
							</td>
							<td class="created-on none">
								<span class="date">
									{{ $asset->created_at->format('m/d/y') }}
								</span>
							</td>
							<td class="updated-on none">
								<span class="date">
									{{ $asset->updated_at->format('m/d/y h:i a') }}
								</span>
								<span class="date-readable">
									{{ $asset->updated_at->diffForHumans($asset->created_at) }}
								</span>
							</td>
							<td class="view-button not-mobile-p">
								<a href="/assets/{{ $asset->id }}" class="btn btn-secondary btn-sm view-link"><i class="fas fa-eye"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->


		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection
