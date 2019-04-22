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
							<a href="{{ route('accounts.index') }}">
								Accounts Table
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Edit Account<span class="d-none d-sm-inline">: {{ $account->name }}</span>
						</li>
					</ol>
				</nav>

				<h1 class="page-heading">
					<i class="fas fa-file-alt"></i> Edit Account

					{{-- BUTTON SET --}}
					<div class="float-right button-set">
						<a href="{{ route('accounts.index') }}" class="btn btn-round">
							Go Back
						</a>
						<a href="{{ route('accounts.show', $account) }}" class="btn btn-secondary">
							<i class="fas fa-eye"></i>
							View Account
						</a>
						<button id="submit-btn" form="edit-form" type="submit" class="btn btn-primary d-block d-sm-inline">
							<i class="far fa-check-circle"></i>
							Save Account
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
									<input form="edit-form" type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" placeholder="Name" value="{{ $account->name }}" autofocus>
								</h2>
							</div>
						</div> <!-- row -->
						<div class="row profile-row">
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
								<div class="profile-image">
									@if ($account->logo_id == null)
										<img src="/media/images/account-default-logo-profile.png" alt="Default Account Logo" />
									@else
										<img src="{{ $account->logo->getURL('profile') ?? '' }}" alt="{{ $account->name }}s Logo" />
									@endif
								</div> <!-- profile image -->

								<div class="col-12 col profile-image-updater" style="margin: -1.5rem 0 0; padding: 2rem 0.5rem 1.25rem;">
									<form method="POST" action="{{ route('account-logo.store') }}" enctype="multipart/form-data">
										@csrf
										<div class="input-group">
											<input type="hidden" name="account_id" id="account_id" value="{{ $account->id }}">
											<div class="custom-file">
												<input id="inputGroupFile04" class="single-file-upload custom-file-input {{ $errors->has('logo') ? 'has-error' : '' }}" type="file" name="logo" aria-describedby="logo-upload">
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
										{{-- Account PHONE_1 --}}
										<div class="form-group">
											<label>
												<i class="fas fa-phone d-lg-none"></i>
												Phone 1
												<span class="required">*</span>
											</label>
											<div class="input-group">
												<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="n/a" value="{{ cleanPhone($account->phone_1) }}">
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
												<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="n/a" value="{{ cleanPhone($account->phone_2) }}">
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
												<input form="edit-form" type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="n/a" value="{{ cleanPhone($account->fax) }}">
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
												<input form="edit-form" type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="n/a" value="{{ $account->email }}">
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
								<form id="edit-form" method="POST" action="{{ route('accounts.update', $account) }}">
									@csrf @method('PATCH')

									<div class="row">
										<div class="col-12 col-md-3 col">
											<div class="form-group">
												<label>
													Created On
												</label>
												<input type="text" class="form-control" name="created_at" value="{{ cleanDate($account->created_at) }}" disabled readonly placeholder="n/a">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											<div class="form-group">
												<label>
													Updated On
												</label>
												<input type="text" class="form-control" name="updated_at" value="{{ cleanDate($account->updated_at) }}" disabled readonly placeholder="n/a">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											{{-- Account Type --}}
											<div class="form-group">
												<label for="account_type_id">
													Account Type
													<span class="required">*</span>
												</label>
												<select class="form-control" id="account_type_id" name="account_type_id">
													<option value="">None</option>
													@foreach($account_types as $id => $account_type)
													<option value="{{ $id }}" {{ $account->account_type_id == $id ? 'selected' : '' }}>
														{{ $account_type }}
													</option>
													@endforeach
												</select>
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											<div class="form-group">
												<label>
													Account Status
												</label>
												<select class="form-control" id="status_id" name="status_id">
													@foreach($statuses as $id => $status)
													<option value="{{ $id }}" {{ $account->status_id == $id ? 'selected' : '' }}>
														{{ $status }}
													</option>
													@endforeach
												</select>
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
												<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" placeholder="n/a" value="{{ $account->street_1 }}">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-6 col">
											{{-- Account STREET_2 --}}
											<div class="form-group">
												<label>
													Street Address 2
													<span class="optional">(optional)</span>
												</label>
												<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" placeholder="n/a" value="{{ $account->street_2 }}">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-4 col">
											{{-- Account CITY --}}
											<div class="form-group">
												<label>
													City
													<span class="required">*</span>
												</label>
												<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" placeholder="n/a" value="{{ $account->city }}">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-4 col">
											{{-- Account STATE --}}
											<div class="form-group">
												<label>
													State
													<span class="required">*</span>
												</label>
												<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $account->state }}">
													@foreach ($states as $abbr => $name)
													<option value="{{$abbr}}" {{ $account->state == "$abbr" ? 'selected' : '' }}>{{ $name }}</option>
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
												<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="n/a" value="{{ $account->zip }}">
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
												<label>Contact Name:</label>
												<input class="form-control {{ $errors->has('contact_name') ? 'has-error' : '' }}" name="contact_name" value="{{ $account->contact_name }}" >
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											{{-- Contact Phone 1 --}}
											<div class="form-group">
												<label>Contact Phone 1:</label>
												<input class="form-control {{ $errors->has('contact_phone_1') ? 'has-error' : '' }}" name="contact_phone_1" value="{{ cleanPhone($account->contact_phone_1) }}" >
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											{{-- Contact Phone 2 --}}
											<div class="form-group">
												<label>Contact Phone 2:</label>
												<input class="form-control {{ $errors->has('contact_phone_2') ? 'has-error' : '' }}" name="contact_phone_2" value="{{ cleanPhone($account->contact_phone_2) }}" >
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-3 col">
											{{-- Contact Email --}}
											<div class="form-group">
												<label>Contact Email:</label>
												<input class="form-control {{ $errors->has('contact_email') ? 'has-error' : '' }}" name="contact_email" value="{{ $account->contact_email }}" >
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
													<input type="text" class="form-control {{ $errors->has('acct_num') ? 'has-error' : '' }}" name="acct_num" placeholder="n/a" value="{{ $account->acct_num }}">
												</div> <!-- input group -->
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-5 col">
											{{-- Account URL --}}
											<div class="form-group">
												<label>Account URL</label>
												<input type="text" class="form-control {{ $errors->has('url') ? 'has-error' : '' }}" name="url" placeholder="n/a" value="{{ $account->url }}">
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-2 col">
											{{-- Account Company ID --}}
											<div class="form-group">
												<label>
													Company
												</label>
												<select class="form-control {{ $errors->has('company_id') ? 'has-error' : '' }}" id="company_id" name="company_id">
													@if($account->company_id == null)
														<option value="" selected>Choose One</option>
														@foreach($companies as $company)
															<option value="{{ $company->id }}">
																{{ $company->name }}
															</option>
														@endforeach
													@else
														@foreach($companies as $company)
															<option value="{{ $company->id }}" {{ $account->company_id == $company->id ? 'selected' : '' }}>
																{{ $company->name }}
															</option>
														@endforeach
														<option value="">None</option>
													@endif
												</select>
											</div>
										</div> <!-- col -->
										<div class="col-12 col-md-2 col">
											{{-- Account Asset ID --}}
											<div class="form-group">
												<label>
													Asset
												</label>
												<select class="form-control {{ $errors->has('asset_id') ? 'has-error' : '' }}" id="asset_id" name="asset_id">
													@if($account->asset_id == null)
														<option value="" selected>Choose One</option>
														@foreach($assets as $asset)
															<option value="{{ $asset->id }}">
																{{ $asset->name }}
															</option>
														@endforeach
													@else
														@foreach($assets as $asset)
															<option value="{{ $asset->id }}" {{ $account->asset_id == $asset->id ? 'selected' : '' }}>
																{{ $asset->name }}
															</option>
														@endforeach
														<option value="">None</option>
													@endif
												</select>
											</div>
										</div> <!-- col -->
									</div> <!-- row -->
								</form>
							</div> <!-- col -->
						</div> <!-- row -->

					</section>

				</div> <!-- profile wrapper -->

			</form>
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->


@endsection
