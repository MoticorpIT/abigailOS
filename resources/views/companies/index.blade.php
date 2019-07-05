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
                {{-- ACTIVE COMPANIES --}}
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
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($activeCompanies as $company)
						    @include('layouts.components.companies-table')
						@endforeach
					</tbody>
                </table> <!-- company table -->

                {{-- INACTIVE COMPANIES --}}
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
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($inactiveCompanies as $company)
						    @include('layouts.components.companies-table')
						@endforeach
					</tbody>
				</table> <!-- company table -->
			</div> <!-- company-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->


@endsection
