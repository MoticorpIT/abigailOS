@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="{{ route('users.store') }}">
				@csrf

				<h1 class="page-heading">
					Add New User

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('users.index') }}" class="btn btn-round">Cancel</a>
						<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save User</button>
					</div>
					<div class="clear"></div>
				</h1>

				<div class="profile-wrapper">
					@include('layouts.errors')

					<section class="profile-head">
						<div class="row subhead">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
							<div class="col-12 col-sm-7 col-md-8 col-lg-9">
								<h2 class="heading">User Details</h2>
							</div>
						</div> <!-- row -->
						<div class="row profile-row">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
								<div class="profile-image">
									<img src="/media/images/user-default-avatar-profile.png" alt="Default User Avatar" />
								</div> 
							</div>
							<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
								<div class="row">
									
									<div class="col-12 col-md-12 col">
										{{-- USER NAME --}}
										<div class="form-group">
											<label>
												Name
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER EMAIL --}}
										<div class="form-group">
											<label>
												Email
												<span class="required">*</span>
											</label>
											<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="abbafan123@gmail.com" value="{{ old('email') }}">
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER PASSWORD --}}
										<div class="form-group">
											<label>
												Password
												<span class="required">*</span>
											</label>
											<input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" name="password" value="{{ old('password') }}">
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