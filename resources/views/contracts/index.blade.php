@extends('layouts.app')

@section('content')

<p>This page will not exsist in the production version. To view contracts, visit assets and/or tenants. Leaving it here for now because contract.store and contract.update are currently redirecting here. Once the redirect location is determined, this view/route will be gone</p>

<div class="db-boxes-row row no-gutters mb-3">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-exclamation-circle"></i> 'Active' Contracts
				<a href="{{ route('contracts.create') }}" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-exclamation-circle"></i>
					Create Contract
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="id">ID</th>
							<th class="text-left">Tenant</th>
							<th class="text-left">Asset</th>
							<th class="text-left">Terms</th>
							<th class="view-button text-left not-mobile-p">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contracts as $contract)
							@if($contract->term_ended != null)
								<tr>
									<td class="id">
										{{ $contract->id }}
									</td>
									<td class="text-left">{{ $contract->tenant->first_name }} {{ $contract->tenant->last_name }}</td>
									<td class="text-left">{{ $contract->asset->name }}</td>
									<td class="text-left">{{ $contract->term_length }}</td>
									<td class="view-button">
										<a href="{{ route('contracts.show', $contract) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-eye"></i>
										</a>
										<a href="{{ route('contracts.edit', $contract) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-pencil-alt"></i>
										</a>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-exclamation-circle"></i> 'Inactive' Contracts
				<a href="{{ route('contracts.create') }}" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-exclamation-circle"></i>
					Create Contract
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="id">ID</th>
							<th class="text-left">Tenant</th>
							<th class="text-left">Asset</th>
							<th class="text-left">Terms</th>
							<th class="view-button text-left not-mobile-p">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contracts as $contract)
							@if($contract->term_ended != null)
								<tr>
									<td class="id">
										{{ $contract->id }}
									</td>
									<td class="text-left">{{ $contract->tenant->first_name }} {{ $contract->tenant->last_name }}</td>
									<td class="text-left">{{ $contract->asset->name }}</td>
									<td class="text-left">{{ $contract->term_length }}</td>
									<td class="view-button">
										<a href="{{ route('contracts.show', $contract) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-eye"></i>
										</a>
										<a href="{{ route('contracts.edit', $contract) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-pencil-alt"></i>
										</a>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection

