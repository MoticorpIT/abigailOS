@extends('layouts.app')

@section('content')

<style>
.has-error { border-color: red; }
.custom-file-label::after { content: none; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			

			<nav aria-label="breadcrumb" class="d-none d-sm-block">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('dashboard') }}">
							Dashboard
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route('tenants.index') }}">
							Tenant Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Edit Tenant<span class="d-none d-sm-inline">: {{ $tenant->first_name }} {{ $tenant->last_name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-users"></i> Edit Tenant

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="{{ route('tenants.index') }}" class="btn btn-round">
						Go Back
					</a>
					<a href="{{ route('tenants.show', $tenant) }}" class="btn btn-secondary">
						<i class="fas fa-eye"></i>
						View Tenant
					</a>
					<button form="edit-form" id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
						<i class="far fa-check-circle"></i>
						Save Tenant
					</button>
				</div> <!-- button set -->
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">
				@include('layouts.errors')

				<section class="profile-head">
					<div class="row subhead no-gutters">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">
								<div class="row">
									<div class="col-12 col-md-6">
										<input form="edit-form" type="text" class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ $tenant->first_name }}" placeholder="First Name">
									</div> <!-- col -->
									<div class="col-12 col-md-6">
										<input form="edit-form" type="text" class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ $tenant->last_name }}" placeholder="Last Name">
									</div> <!-- col -->
								</div> <!-- row -->
							</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								@if ($tenant->image_id == null)
									<img src="/media/images/tenant-default-image-profile.png" alt="Default Tenants Image" />
								@else
									<img src="{{ $tenant->image->getURL('profile') ?? '' }}" alt="{{ $tenant->name }}s Image" />
								@endif
							</div> <!-- profile image -->

							<div class="col-12 col profile-image-updater" style="margin: -1.5rem 0 0; padding: 2rem 0.5rem 1.25rem;">
								<form method="POST" action="{{ route('tenant-image.store') }}" enctype="multipart/form-data">
									@csrf
									<div class="input-group">
										<input type="hidden" name="tenant_id" id="tenant_id" value="{{ $tenant->id }}">
										<div class="custom-file">
											<input id="inputGroupFile04" class="single-file-upload custom-file-input {{ $errors->has('image') ? 'has-error' : '' }}" type="file" name="image" aria-describedby="image-upload">
											<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
										</div>
										<div class="input-group-append">
											<button class="single-file-upload-btn btn btn-primary" type="submit" disabled>Upload</button>
										</div>
									</div>
								</form>
							</div>

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
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="n/a" value="{{ cleanPhone($tenant->phone_1) }}">
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
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="n/a" value="{{ cleanPhone($tenant->phone_2) }}">
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
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="n/a" value="{{ cleanPhone($tenant->fax) }}">
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
											<input form="edit-form" type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="n/a" value="{{ $tenant->email }}">
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
							<form id="edit-form" method="POST" action="{{ route('tenants.update', $tenant) }}">
								@csrf @method('PATCH')
								
								<div class="row">
									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label for="created-at">
												Created On
											</label>
											<input type="text" class="form-control" name="created_at" placeholder="{{ cleanDate($tenant->created_at) }}" disabled readonly>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label for="updated-at">
												Updated On
											</label>
											<input type="text" class="form-control" name="updated_at" placeholder="Now" disabled readonly>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										{{-- Tenant Account Standing DROPDOWN --}}
										<div class="form-group">
											<label for="company_type_id">
												Account Standing
												<span class="required">*</span>
											</label>
											<select class="form-control" id="account_standing_id" name="account_standing_id">
												@foreach($account_standings as $id => $account_standing)
												<option value="{{ $id }}" {{ $id == $tenant->account_standing_id ? 'selected' : '' }}>
													{{ $account_standing }}
												</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										{{-- STATUS DROPDOWN --}}
										<div class="form-group">
											<label for="status_id">
												Tenant Status
												<span class="required">*</span>
											</label>
											<select class="form-control" id="status_id" name="status_id">
												@foreach($statuses as $id => $status)
												<option value="{{ $id }}" {{ $tenant->status_id == $id ? 'selected' : '' }}>
													{{ $status }}
												</option>
												@endforeach
											</select>
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
											<input class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ $tenant->co_first_name }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- Co-Tenant Last Name --}}
										<div class="form-group">
											<label>Co-Tenant Last Name:</label>
											<input class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ $tenant->co_last_name }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Co-Tenant Phone 1 --}}
										<div class="form-group">
											<label>Co-Tenant Phone 1:</label>
											<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ cleanPhone($tenant->co_phone_1) }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Co-Tenant Phone 2 --}}
										<div class="form-group">
											<label>Co-Tenant Phone 2:</label>
											<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ cleanPhone($tenant->co_phone_2) }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Co-Tenant Email --}}
										<div class="form-group">
											<label>Co-Tenant Email:</label>
											<input class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ $tenant->co_email }}" placeholder="n/a">
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
											<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $tenant->street_1 }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- Tenant STREET_2 --}}
										<div class="form-group">
											<label>
												Street Address 2
												<span class="optional">(optional)</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $tenant->street_2 }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Tenant CITY --}}
										<div class="form-group">
											<label>
												City
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $tenant->city }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Tenant STATE --}}
										<div class="form-group">
											<label>
												State
												<span class="required">*</span>
											</label>
											<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $tenant->state }}">
												@foreach ($states as $abbr => $name)
												<option value="{{$abbr}}" {{ $tenant->state == "$abbr" ? 'selected' : '' }}>{{ $name }}</option>
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
											<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="n/a" value="{{ $tenant->zip }}">
										</div>
									</div> <!-- col -->

								</div> <!-- row -->
							</form>
						</div> <!-- col -->
					</div> <!-- row -->

				</section>

			</div> <!-- profile wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection
