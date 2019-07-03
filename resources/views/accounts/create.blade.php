@extends('layouts.app')

@section('content')


<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="{{ route('accounts.store') }}">
				@csrf

				<nav aria-label="breadcrumb" class="d-none d-sm-block">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">
								Dashboard
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('accounts.index') }}">
								Accounts Table
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Create Account
						</li>
					</ol>
				</nav>

				<h1 class="page-heading">
					<i class="fas fa-file-alt"></i> Add New Account

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('accounts.index') }}" class="btn btn-round">Cancel</a>
						<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
							<i class="fas fa-check-circle"></i>
							Save Account
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
								<h2 class="profile-heading heading">
									<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
								</h2>
							</div>
						</div> <!-- row -->
						<div class="row profile-row">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
								<div class="profile-image">
									<a href="#0" class="" data-toggle="modal" data-target="#update-images">
                                        <img src="/media/images/account-default-logo-profile.png" alt="Default Account Logo" />
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
										{{-- Account PHONE_1 --}}
										<div class="form-group">
											<label>
												<i class="fas fa-phone d-lg-none"></i>
												Phone 1
												<span class="required">*</span>
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="(555) 555-5555" value="{{ old('phone_1') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-phone"></i>
													</div>
												</div>
											</div>
										</div>
										{{-- Account PHONE_2 --}}
										<div class="form-group">
											<label>
												<i class="fas fa-phone d-lg-none"></i>
												Phone 2
												<span class="optional">(optional)</span>
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="(555) 555-5555" value="{{ old('phone_2') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-phone"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
										{{-- Account FAX --}}
										<div class="form-group">
											<label>
												<i class="fas fa-fax d-lg-none"></i>
												Fax
											</label>
											<div class="input-group">
												<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="(555) 555-555" value="{{ old('fax') }}">
												<div class="input-group-append d-none d-lg-block">
													<div class="input-group-text">
														<i class="fas fa-fax"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
										{{-- Account EMAIL --}}
										<div class="form-group">
											<label>
												<i class="fas fa-at d-lg-none"></i>
												Email
											</label>
											<div class="input-group">
												<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="abbafan123@gmail.com" value="{{ old('email') }}">
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
										<div class="form-group">
											<label>
												Created On
											</label>
											<input class="form-control" placeholder="Now" readonly disabled>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label>
												Updated On
											</label>
											<input class="form-control" placeholder="n/a" readonly disabled>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Account Type --}}
										<div class="form-group">
											<label for="account_type_id">
												Account Type
												<span class="required">*</span>
											</label>
											<select class="form-control {{ $errors->has('account_type_id') ? 'has-error' : '' }}" id="account_type_id" name="account_type_id">
												<option value="" selected>Choose One</option>
												@foreach($account_types as $id => $account_type)
													<option value="{{ $id }}" {{ old('account_type_id') == $id ? 'selected' : '' }}>{{ $account_type }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label>
												Account Status
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
										{{-- Account STREET_1 --}}
										<div class="form-group">
											<label>
												Street Address
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" placeholder="123 Fake St" value="{{ old('street_1') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- Account STREET_2 --}}
										<div class="form-group">
											<label>
												Street Address 2
												<span class="optional">(optional)</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" placeholder="Apt 404" value="{{ old('street_2') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Account CITY --}}
										<div class="form-group">
											<label>
												City
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" placeholder="Myrtle Beach" value="{{ old('city') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Account STATE --}}
										<div class="form-group">
											<label>
												State
												<span class="required">*</span>
											</label>
											<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state">
												<option value="" selected>Choose One</option>
												@foreach ($states as $abbr => $name)
													<option value="{{ $abbr }}" {{ old('state') == $abbr ? 'selected' : '' }}>{{ $name }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- Account ZIP --}}
										<div class="form-group">
											<label>
												ZIP
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="29577" value="{{ old('zip') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col">
										<h4 class="heading divider">
											<i class="fas fa-user"></i>
											Contact
										</h4>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Contact Last Name --}}
										<div class="form-group">
											<label>Contact Name</label>
											<input class="form-control {{ $errors->has('contact_name') ? 'has-error' : '' }}" name="contact_name" value="{{ old('contact_name') }}" >
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Contact Phone 1 --}}
										<div class="form-group">
											<label>Contact Phone 1</label>
											<input class="form-control {{ $errors->has('contact_phone_1') ? 'has-error' : '' }}" name="contact_phone_1" value="{{ old('contact_phone_1') }}" >
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Contact Phone 2 --}}
										<div class="form-group">
											<label>Contact Phone 2</label>
											<input class="form-control {{ $errors->has('contact_phone_2') ? 'has-error' : '' }}" name="contact_phone_2" value="{{ old('contact_phone_2') }}" >
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Contact Email --}}
										<div class="form-group">
											<label>Contact Email</label>
											<input class="form-control {{ $errors->has('contact_email') ? 'has-error' : '' }}" name="contact_email" value="{{ old('contact_email') }}" >
										</div>
									</div> <!-- col -->
									<div class="col-12 col">
										<h4 class="heading divider">
											<i class="fas fa-info-circle"></i>
											Information
										</h4>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- Account Number --}}
										<div class="form-group">
											<label>Account Number</label>
											<div class="input-group">
												<input type="text" class="form-control {{ $errors->has('acct_num') ? 'has-error' : '' }}" name="acct_num" placeholder="#1337" value="{{ old('acct_num') }}">
											</div> <!-- input group -->
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-5 col">
										{{-- Account URL --}}
										<div class="form-group">
											<label>Account URL</label>
											<input type="text" class="form-control {{ $errors->has('url') ? 'has-error' : '' }}" name="url" placeholder="http://accounturl.com" value="{{ old('url') }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-2 col">
										{{-- Account Company ID --}}
										<div class="form-group">
											<label>
												Company
											</label>
											<select class="form-control {{ $errors->has('company_id') ? 'has-error' : '' }}" name="company_id">
												<option value="" selected>Choose One</option>
												@foreach ($companies as $company)
													<option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-2 col">
										{{-- Account Asset ID --}}
										<div class="form-group">
											<label>
												Asset
											</label>
											<select class="form-control {{ $errors->has('asset_id') ? 'has-error' : '' }}" name="asset_id">
												<option value="" selected>Choose One</option>
												@foreach ($assets as $asset)
													<option value="{{ $asset->id }}" {{ old('asset_id') == $asset->id ? 'selected' : '' }}>{{ $asset->name }}></option>
												@endforeach
											</select>
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
