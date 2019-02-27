@extends('layouts.app')

@section('content')
<style>
.has-error { border-color: red; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<h1 class="page-heading">
					Edit User

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('users.index') }}" class="btn btn-round">Cancel</a>
						@if(Auth::user()->id == $user->id)
							<a href="/users/{{Auth::user()->id}}/edit-pw" class="btn btn-round">Change Password</a>
						@endif
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
									<img src="{{ $avatarURL }}" />
								</div> <!-- profile image -->

								<div class="col-12 col profile-image-updater">
									{{-- USER AVATAR --}}
									<div class="form-group">
										<label>
											Avatar
											<span class="optional">(400 x 400)</span>
										</label>
										<input type="file" class="form-control {{ $errors->has('avatar') ? 'has-error' : '' }}" name="avatar" {{-- value="{{ $user->avatar }}" --}}>
									</div>
								</div> <!-- col -->

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
											<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ $user->name }}" autofocus>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER EMAIL --}}
										<div class="form-group">
											<label>
												Email
												<span class="required">*</span>
											</label>
											<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $user->email }}">
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-12 col">
										{{-- USER STATUS --}}
										<div class="form-group">
											<label for="is_active">
												User Status
												<span class="required">*</span>
											</label>
											<select class="form-control" id="is_active" name="is_active">
												<option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}> Active </option>
												<option value="2" {{ $user->is_active == 2 ? 'selected' : '' }}> Inactive </option>
											</select>
										</div>
									</div> <!-- col -->

								</div> <!-- row -->
							</div> <!-- col -->
						</div> <!-- row -->

					</section>
				</div> <!-- profile wrapper -->
			</form>


			<form method="POST" action="{{ route('avatar.store') }}" enctype="multipart/form-data">
				@csrf
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="avatar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
						<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
					</div>
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
					</div>
				</div>
			</form>
		

		</div> <!-- db-box -->
	</div> <!-- col -->
</div>
@endsection