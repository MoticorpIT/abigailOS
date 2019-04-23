@extends('layouts.app')

@section('content')

	<div class="db-boxes-row row no-gutters">
		<div class="col-12">
			<div class="lowerlevel db-box">
				<h1 class="page-heading">
					<i class="fas fa-file-alt"></i> Accounts
					<a href="{{ route('accounts.create') }}" class="btn btn-primary d-block-small float-right">
						<i class="fas fa-plus-square"></i>
						Create Account
					</a>
					<a href="{{ route('accounts.export') }}" class="btn d-block-small float-right">
						<i class="fas fa-file-download"></i>
						Download
					</a>
				</h1>

				<div class="tenant-table-wrapper table-wrapper table-responsive">
					<table class="tenant-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
						<thead>
							<tr>
								<th class="name all">
									Name
								</th>
								<th class="id none">
									ID
								</th>
								<th class="acct-num">
									Account Number
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
									ZIP
								</th>
								<th class="created-on none">
									Created
								</th>
								<th class="updated-on none">
									Updated
								</th>
								<th class="view-button not-mobile-p">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($accounts->sortBy('last_name') as $account)
								<tr class="status-{{ $account->status_id }}">
									<td class="name all">
										{{ $account->name }}
									</td>
									<td class="id none">
										{{ $account->id }}
									</td>
									<td class="acct-num">
										{{ $account->acct_num }}
									</td>
									<td class="contact">
										<div class="btn-group contact-button">
											<a href="tel:{{ cleanPhone($account->phone_1) }}" class="btn btn-secondary">
												<span><i class="fas fa-phone"></i> {{ cleanPhone($account->phone_1) }}</span>
											</a>
											<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												@if($account->phone_2)
													<a class="dropdown-item" href="tel:{{ cleanPhone($account->phone_2) }}">
														<span><i class="fas fa-phone"></i> {{ cleanPhone($account->phone_2) }}</span>
													</a>
												@endif
												@if($account->fax)
													<a class="dropdown-item">
														<span><i class="fas fa-fax"></i> {{ cleanPhone($account->fax) }}</span>
													</a>
												@endif
												@if($account->email)
													<a class="dropdown-item" href="mailto:{{ $account->email }}">
														<span><i class="fas fa-at"></i> {{ $account->email }}</span>
													</a>
												@endif
											</div>
										</div> <!-- btn group -->
									</td>
									<td class="street-address">
										<span class="item">{{ $account->street_1 }}</span>
										<span class="item">{{ $account->street_2 }}</span>
									</td>
									<td class="city">
										{{ $account->city }}
									</td>
									<td class="state">
										{{ $account->state }}
									</td>
									<td class="zip">
										{{ $account->zip }}
									</td>
									<td class="created-on none">
										<span class="date">
											{{ cleanDate($account->created_at) }}
										</span>
									</td>
									<td class="updated-on none">
										@if($account->updated_at != null)
											<span class="date">
												{{ cleanDate($account->updated_at) }}
											</span>
											<span class="date-readable">
												{{ $account->updated_at->diffForHumans() }}
											</span>
										@else
											<span class="date">
												NA
											</span>
										@endif
									</td>
									<td class="view-button not-mobile-p">
										<a href="{{ route('accounts.show', $account) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-eye"></i>
										</a>
										<a href="{{ route('accounts.edit', $account) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-pencil-alt"></i>
										</a>
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
