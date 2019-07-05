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
                    {{-- ACTIVE ACCOUNTS --}}
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
							@foreach($activeAccounts as $account)
								@include('layouts.components.accounts-table')
							@endforeach
						</tbody>
                    </table> <!-- tenant table -->

                    {{-- INACTIVE ACCOUNTS --}}
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
							@foreach($inactiveAccounts as $account)
								@include('layouts.components.accounts-table')
							@endforeach
						</tbody>
					</table> <!-- tenant table -->
                </div> <!-- tenant-table-wrapper -->

			</div> <!-- db-box -->
		</div> <!-- col -->
	</div> <!-- db boxes -->


@endsection
