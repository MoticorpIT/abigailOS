@extends('layouts.app')

@section('content')
<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form>
				<h1 class="page-heading">
					User Profile

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('users.index') }}" class="btn btn-round">Go Back</a>
						<a href="/users/{{ $user->id }}/edit" id="submit-btn" class="btn btn-primary d-block d-sm-inline">Edit User</a>
					</div>
					<div class="clear"></div>
				</h1>

				<div class="profile-wrapper">

					<section class="profile-head">
						<div class="row subhead" style="margin: 0; padding: 5px 0">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
							<div class="col-12 col-sm-7 col-md-8 col-lg-9">
								<h2 class="heading">User Details</h2>
							</div>
						</div> <!-- row -->
						<div class="row profile-row">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
								<div class="profile-image">
									@if ($user->avatar_id == null)
										<img src="/media/images/user-default-avatar-profile.png" alt="Default User Avatar" />
									@else
										<img src="{{ $user->avatar->getURL('profile') ?? '' }}" alt="{{ $user->avatar->file_name }}s-avatar" />
									@endif
								</div> <!-- profile image -->
							</div>
							<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
								<div class="row">
									
									<div class="col-12 col-md-12 col">
										{{-- USER NAME --}}
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ $user->name }}" disabled readonly>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER EMAIL --}}
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $user->email }}" disabled readonly>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER STATUS --}}
										<div class="form-group">
											<label for="status_id">User Status</label>
											<input type="text" class="form-control" name="status" value="{{ $user->is_active == 1 ? 'Active' : 'Inactive'}}" autofocus disabled readonly placeholder="n/a">
										</div>
									</div> <!-- col -->

								</div> <!-- row -->
							</div> <!-- col -->
						</div> <!-- row -->

					</section>

				</div> <!-- profile wrapper -->

			</form>
		</div> <!-- db-box -->
	</div> <!-- col -->
</div>
@endsection