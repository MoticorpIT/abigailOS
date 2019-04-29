
@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="{{ route('assets.store') }}">
				@csrf

				<nav aria-label="breadcrumb" class="d-none d-sm-block">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">
								Dashboard
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('assets.index') }}">
								Asset Table
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Create Asset
						</li>
					</ol>
				</nav>

				<h1 class="page-heading">
					<i class="fas fa-briefcase"></i> Create Asset

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('assets.index') }}" class="btn btn-round">
							Cancel
						</a>
						<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
							<i class="far fa-check-circle"></i>
							Save Asset
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
								<h2 class="profile-heading heading">
									<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ old('name') }}" placeholder="Asset Name">
								</h2>
							</div>
						</div> <!-- row -->
						<div class="row profile-row">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
								<div class="profile-image">
									<a href="#0" class="" data-toggle="modal" data-target="#update-images">
										<img src="/media/images/asset-default-image-profile.png" alt="Default Asset Image" />
									</a>
								</div> <!-- profile image -->

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
										{{-- Asset PHONE_1 --}}
										<div class="form-group">
											<label>
												<i class="fas fa-phone d-lg-none"></i>
												Phone 1
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ old('phone_1') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-phone"></i>
													</div>
												</div>
											</div>
										</div>
										{{-- Asset PHONE_2 --}}
										<div class="form-group">
											<label>
												<i class="fas fa-phone d-lg-none"></i>
												Phone 2
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ old('phone_2') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-phone"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
										{{-- Asset FAX --}}
										<div class="form-group">
											<label>
												<i class="fas fa-fax d-lg-none"></i>
												Fax
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ old('fax') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-fax"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
										{{-- Asset EMAIL --}}
										<div class="form-group">
											<label>
												<i class="fas fa-at d-lg-none"></i>
												Email
											</label>
											<div class="input-group">
												<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ old('email') }}">
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
									<div class="col-12 col-md-3 col">
										{{-- Asset Type --}}
										<div class="form-group">
											<label>
												Created On
											</label>
											<input class="form-control" placeholder="Now" readonly disabled>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Type --}}
										<div class="form-group">
											<label>
												Updated On
											</label>
											<input class="form-control" placeholder="NA" readonly disabled>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Type --}}
										<div class="form-group">
											<label>
												Asset Type
											</label>
											<select class="form-control" id="asset_type_id" name="asset_type_id">
												<option value="">Choose One</option>
												@foreach($asset_types as $id => $asset_type)
													<option value="{{ $id }}" {{ old('asset_type_id') == $id ? 'selected' : '' }}>{{ $asset_type }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Status --}}
										<div class="form-group">
											<label>
												Asset Status
											</label>
											<select class="form-control" disabled readonly>
												<option value="1">Active</option>
											</select>
											<input type="hidden" id="status_id" name="status_id" value="1">
										</div>
									</div> <!-- col -->
									<div class="col-12 col">
										<h4 class="heading divider">
											<i class="fas fa-globe-americas"></i>
											Address
										</h4>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- Asset STREET_1 --}}
										<div class="form-group">
											<label>
												Street Address
											</label>
											<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ old('street_1') }}" placeholder="">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- Asset STREET_2 --}}
										<div class="form-group">
											<label>
												Street Address 2
											</label>
											<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ old('street_2') }}" placeholder="">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Asset CITY --}}
										<div class="form-group">
											<label>
												City
											</label>
											<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ old('city') }}" placeholder="">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Asset STATE --}}
										<div class="form-group">
											<label>
												State
											</label>
											<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ old('state') }}">
												<option value="" selected>Choose One</option>
												@foreach ($states as $abbr => $name)
													<option value="{{$abbr}}" {{ old('state') == $abbr ? 'selected' : '' }}>{{ $name }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Asset ZIP --}}
										<div class="form-group">
											<label>
												ZIP
											</label>
											<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ old('zip') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col">
										<h4 class="heading divider">
											<i class="fas fa-info-circle"></i>
											Information
										</h4>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Company Name --}}
										<div class="form-group">
											<label>
												Company
											</label>
											<select class="form-control {{ $errors->has('company_id') ? 'has-error' : '' }}" name="company_id" value="{{ old('company_id') }}">
												<option value="" selected>Choose One</option>
												@foreach ($companies as $company)
													<option value="{{$company->id}}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Company Name --}}
										<div class="form-group">
											<label>
												Acquired Date
											</label>
											<input type="date" class="form-control {{ $errors->has('$asset->acquired_date') ? 'has-error' : '' }}" name="acquired_date" value="{{ old('acquired_date') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Rent --}}
										<div class="form-group">
											<label>
												Asset Rent
											</label>
											<input class="form-control {{ $errors->has('rent') ? 'has-error' : '' }}" name="rent" value="{{ old('rent') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Asset Deposit --}}
										<div class="form-group">
											<label>
												Asset Deposit
											</label>
											<input class="form-control {{ $errors->has('deposit') ? 'has-error' : '' }}" name="deposit" value="{{ old('deposit') }}">
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

@endsection
