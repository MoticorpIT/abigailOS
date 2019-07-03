@extends('layouts.app')

@section('content')

	<div class="db-boxes-row row no-gutters">
		<div class="col-12">
			<div class="lowerlevel db-box">
				<h1 class="page-heading">
					<i class="fas fa-user-cog"></i>
					Users
					<a href="{{ route('users.create') }}" class="btn btn-primary d-block-small float-right">
						<i class="fas fa-plus-square"></i>
						Create User
					</a>
					<a href="{{ route('users.export') }}" class="btn d-block-small float-right">
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
								<th class="email">
									Email
								</th>
								<th class="email">
									Status
								</th>
								<th class="view-button not-mobile-p">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td class="name all text-capitalize">
										{{ $user->name }}
									</td>
									<td class="text-capitalize">
										{{ $user->email }}
									</td>
									<td class="text-capitalize">
										{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
									</td>
									<td class="view-button not-mobile-p">
										<a href="{{ route('users.show', $user) }}" class="btn btn-secondary btn-sm user-view-link">
											<i class="fas fa-eye"></i>
										</a>
										<a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm user-edit-link">
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
