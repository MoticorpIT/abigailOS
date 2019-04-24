@extends('layouts.app')

@section('content')
<style>
.has-error { border-color: red; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="{{ route('passwords.update', $user) }}">
				@csrf @method('PUT')
				
				<h1 class="page-heading">
					Change Password

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('users.index') }}" class="btn btn-round">Cancel</a>
						<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save Password</button>
					</div>
					<div class="clear"></div>
				</h1>

				<div class="profile-wrapper">
					@include('layouts.errors')

					<section class="profile-head">
						
						<div class="row subhead">
							<div class="col-12 col-md-12">
								<h2 class="heading">Change Password</h2>
							</div>
						</div>

						<div class="row profile-row">
							<div class="col-12 col-md-12 profile-detail-col">
								<div class="row">

									<div class="col-12 col-md-12 col">
										<div class="form-group">
											<label>Current Password <span class="required">*</span></label>
											<input type="password" class="form-control {{ $errors->has('current_password') ? 'has-error' : '' }}" id="current_password" name="current_password">
										</div>
									</div>

									<div class="col-12 col-md-12 col">
										<div class="form-group">
											<label>New Password <span class="required">*</span></label>
											<input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" id="password" name="password">
										</div>
									</div>

								</div> 
							</div> 
						</div> 

					</section>
				</div> 

			</form>
		</div> 
	</div> 
</div>
@endsection