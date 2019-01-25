@extends('layouts.app')

@section('content')

	<div class="db-boxes-row row no-gutters">
		<div class="col-12">
			<div class="lowerlevel db-box">
				<h1 class="page-heading">
					<i class="fas fa-user-cog"></i>
					Users
					<a href="/users/create" class="btn btn-primary d-block-small float-right">
						<i class="fas fa-plus-square"></i>
						Create User
					</a>
				</h1>

				<div class="tenant-table-wrapper table-wrapper table-responsive">
					<table class="tenant-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
						<thead>
							<tr>
								<th class="name all">
									Name
								</th>
								<th class="id">
									ID
								</th>
								<th class="view-button not-mobile-p">
									View
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td class="name all text-capitalize">
										{{ $user->name }}
									</td>
									<td class="id">
										{{ $user->id }}
									</td>
									<td class="view-button not-mobile-p">
										<a href="/users/{{ $user->id }}" class="btn btn-secondary btn-sm user-edit-link"><i class="fas fa-edit"></i> Edit User</i></a>
										<a href="/users/{{ $user->id }}" class="btn btn-secondary btn-sm user-view-link"><i class="fas fa-eye"></i> View Profile</a>
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
