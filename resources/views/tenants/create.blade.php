@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/tenants">
				{{ csrf_field() }}

				<nav aria-label="breadcrumb" class="d-none d-sm-block">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item">
							<a href="/dashboard/">
								Dashboard
							</a>
						</li>
				    <li class="breadcrumb-item">
							<a href="/tenants/">
								Tenant Table
							</a>
						</li>
				    <li class="breadcrumb-item active" aria-current="page">
							Create Tenant
						</li>
				  </ol>
				</nav>

			<h1 class="page-heading">
				Add New Tenant

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="#0" class="btn btn-round">Cancel</a>
					<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
						<i class="fas fa-check-circle"></i>
						Save Tenant
					</button>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">
				@include('layouts.errors')

				<section class="profile-head">
					<div class="row subhead no-gutters">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">Tenant Name</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								<img src="https://via.placeholder.com/400x400" />
							</div> <!-- profile image -->

							<div class="col-12 col profile-image-updater">
								{{-- Tenant image --}}
								<div class="form-group">
									<label>
										Photo
										<span class="optional">(400 x 400)</span>
									</label>
									<input type="file" class="form-control {{ $errors->has('logo') ? 'has-error' : '' }}" name="logo" placeholder="Path to the Company Logo" value="{{ old('logo') }}">
								</div>
							</div> <!-- col -->

							<nav class="profile-tabs">
							  <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist">
							    <a class="nav-item nav-link active" id="phone-tab-button" data-toggle="tab" href="#phone-tab-content" role="tab" aria-controls="phone-tab" aria-selected="true">
										<i class="fas fa-phone"></i>
									</a>
							    <a class="nav-item nav-link" id="fax-tab-button" data-toggle="tab" href="#fax-tab-content" role="tab" aria-controls="fax-tab" aria-selected="false">
										<i class="fas fa-fax"></i>
									</a>
							    <a class="nav-item nav-link" id="email-tab-button" data-toggle="tab" href="#email-tab-content" role="tab" aria-controls="email-tab" aria-selected="false">
										<i class="fas fa-at"></i>
									</a>
							  </div>
							</nav>
							<div class="tab-content profile-tabs-content" id="nav-tabContent">
							  <div class="tab-pane fade show active" id="phone-tab-content" role="tabpanel" aria-labelledby="phone-tab-button">
									{{-- Tenant PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
											<span class="required">*</span>
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ old('phone_1') }}" >
											<div class="input-group-append d-none d-lg-block">
							          <div class="input-group-text">
							          	<i class="fas fa-phone"></i>
							          </div>
							        </div>
							      </div>
									</div>
									{{-- Tenant PHONE_2 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 2
											<span class="optional">(optional)</span>
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ old('phone_2') }}" >
											<div class="input-group-append d-none d-lg-block">
							          <div class="input-group-text">
							          	<i class="fas fa-phone"></i>
							          </div>
							        </div>
							      </div>
									</div>
							  </div>
							  <div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
									{{-- Tenant FAX --}}
									<div class="form-group">
										<label>
											<i class="fas fa-fax d-lg-none"></i>
											Fax
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ old('fax') }}" >
											<div class="input-group-append d-none d-lg-block">
							          <div class="input-group-text">
							          	<i class="fas fa-fax"></i>
							          </div>
							        </div>
							      </div>
									</div>
							  </div>
							  <div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
									{{-- Tenant EMAIL --}}
									<div class="form-group">
										<label>
											<i class="fas fa-at d-lg-none"></i>
											Email
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ old('email') }}" >
											<div class="input-group-append d-none d-lg-block">
							          <div class="input-group-text">
							          	<i class="fas fa-at"></i>
							          </div>
							        </div>
							      </div>
									</div>
							  </div>
							</div>
						</div> <!-- col -->
						<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
							<div class="row">
								<div class="col-12 col-md-6 col">
									{{-- Tenant First Name --}}
									<div class="form-group">
										<label>
											First Name
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant Last Name --}}
									<div class="form-group">
										<label>
											Last Name
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ old('last_name') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-user"></i>
										Co-Tenant
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Co-Tenant First Name --}}
									<div class="form-group">
										<label>Co-Tenant First Name:</label>
										<input class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ old('co_first_name') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Co-Tenant Last Name --}}
									<div class="form-group">
										<label>Co-Tenant Last Name:</label>
										<input class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ old('co_last_name') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 1 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 1:</label>
										<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ old('co_phone_1') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 2 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 2:</label>
										<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ old('co_phone_2') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Email --}}
									<div class="form-group">
										<label>Co-Tenant Email:</label>
										<input class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ old('co_email') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-globe-americas"></i>
										Address
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant STREET_1 --}}
									<div class="form-group">
										<label>
											Street Address
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ old('street_1') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ old('street_2') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Tenant CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ old('city') }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- TENANT STATE --}}
									<div class="form-group">
									    <label>
									        State
									        <span class="required">*</span>
									    </label>
									    <input class="d-none form-control" name="state" value="{{ old('state') }}">
									    <select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ old('state') }}">
									        <option value="" selected>Choose One</option>
									        @foreach ($states as $abbr => $name)
									            <option value="{{$abbr}}">{{ $name }}</option>
									        @endforeach
									    </select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Tenant ZIP --}}
									<div class="form-group">
										<label>
											ZIP
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ old('zip') }}" >
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
</div> <!-- db boxes -->






	<div class="col-md-12">
		Tenants - create.blade.php || <a href="/tenants/create">Create Tenant</a>
		<hr>
		<h4>Create Tenant</h4>
	</div>
	@include('layouts.errors')
	<div class="col-md-12">
		<form method="POST" action="/tenants">
			{{ csrf_field() }}
			<div class="form-group">
				<label>first name:</label>
				<input class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" >
			</div>

			<div class="form-group">
				<label>last name:</label>
				<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ old('last_name') }}" >
			</div>

			<div class="form-group">
				<label>phone_1:</label>
				<input class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ old('phone_1') }}" >
			</div>

			<div class="form-group">
				<label>phone_2:</label>
				<input class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ old('phone_2') }}" >
			</div>

			<div class="form-group">
				<label>fax:</label>
				<input class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ old('fax') }}" >
			</div>

			<div class="form-group">
				<label>email:</label>
				<input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ old('email') }}" >
			</div>

			<div class="form-group">
				<label>co_first_name:</label>
				<input class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ old('co_first_name') }}" >
			</div>

			<div class="form-group">
				<label>co_last_name:</label>
				<input class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ old('co_last_name') }}" >
			</div>

			<div class="form-group">
				<label>co_phone_1:</label>
				<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ old('co_phone_1') }}" >
			</div>

			<div class="form-group">
				<label>co_phone_2:</label>
				<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ old('co_phone_2') }}" >
			</div>

			<div class="form-group">
				<label>co_email:</label>
				<input class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ old('co_email') }}" >
			</div>

			<div class="form-group">
				<label>street_1:</label>
				<input class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ old('street_1') }}" >
			</div>

			<div class="form-group">
				<label>street_2:</label>
				<input class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ old('street_2') }}" >
			</div>

			<div class="form-group">
				<label>city:</label>
				<input class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ old('city') }}" >
			</div>

			<div class="form-group">
				<label>state:</label>
				<input class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ old('state') }}" >
			</div>

			<div class="form-group">
				<label>zip:</label>
				<input class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ old('zip') }}" >
			</div>{{--

			<div class="form-group">
				<label>account_standing:</label>
				<select class="form-control" id="account_standing_id" name="account_standing_id">
					@foreach($account_standings as $account_standing)
						<option value="{{ $account_standing->id }}">
							{{ $account_standing->name }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>status</label>
				<select class="form-control" id="status_id" name="status_id">
					@foreach($statuses as $status)
						<option value="{{ $status->id }}">
							{{ $status->name }}
						</option>
					@endforeach
				</select>
			</div> --}}

			<div class="form-group">
				<a href="{{ route('tenants.index') }}" class="btn btn-round">Cancel</a>
				<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save Tenant</button>
			</div>
		</form>
	</div>
@endsection
