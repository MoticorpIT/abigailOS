@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-users"></i> Tenants
				<a href="{{ route('tenants.create') }}" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-plus-square"></i>
					Create Tenant
				</a>
				<a href="{{ route('tenants.export') }}" class="btn d-block-small float-right">
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
						@foreach($activeTenants as $tenant)
							@include('layouts.components.tenants-table')
						@endforeach
					</tbody>
                </table> <!-- tenant table -->

                <table class="tenant-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
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
                            @foreach($inactiveTenants as $tenant)
                                @include('layouts.components.tenants-table')
                            @endforeach
                        </tbody>
                    </table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->


		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection
