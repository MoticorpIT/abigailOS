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
						<a href="/dashboard/">
							Dashboard
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/companies/">
							Company Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Edit Company<span class="d-none d-sm-inline">: {{ $company->name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-building"></i>
				Edit Company

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/companies/" class="btn btn-round">
						Go Back
					</a>
					<a href="/companies/{{ $company->id }}" class="btn btn-secondary">
						<i class="fas fa-eye"></i>
						View Company
					</a>
					<button id="submit-btn" form="edit-form" type="submit" class="btn btn-primary d-block d-sm-inline">
						<i class="far fa-check-circle"></i>
						Save Company
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
							<h2 class="heading d-block d-sm-none">
								{{ $company->name }}
							</h2>
							<h2 class="heading d-none d-sm-block">
								<i class="fas fa-building"></i>
								Company Profile
							</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								@if ($company->logo_id == null)
									<img src="/media/images/company-default-logo-profile.png" alt="Default Company Logo" />
								@else
									<img src="{{ $company->logo->getURL('profile') ?? '' }}" alt="{{ $company->name }}s Logo" />
								@endif
							</div> <!-- profile image -->

							<div class="col-12 col profile-image-updater" style="margin: -1.5rem 0 0; padding: 2rem 0.5rem 1.25rem;">
								<form method="POST" action="{{ route('company-logo.store') }}" enctype="multipart/form-data">
									@csrf
									<div class="input-group">
										<input type="hidden" name="company_id" id="company_id" value="{{ $company->id }}">
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
									{{-- COMPANY PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
											<span class="required">*</span>
										</label>
										<div class="input-group">
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="n/a" value="{{ cleanPhone($company->phone_1) }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
									{{-- COMPANY PHONE_2 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 2
											<span class="optional">(optional)</span>
										</label>
										<div class="input-group">
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="n/a" value="{{ cleanPhone($company->phone_2) }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
									{{-- COMPANY FAX --}}
									<div class="form-group">
										<label>
											<i class="fas fa-fax d-lg-none"></i>
											Fax
										</label>
										<div class="input-group">
											<input form="edit-form" type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="n/a" value="{{ cleanPhone($company->fax) }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-fax"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
									{{-- COMPANY EMAIL --}}
									<div class="form-group">
										<label>
											<i class="fas fa-at d-lg-none"></i>
											Email
										</label>
										<div class="input-group">
											<input form="edit-form" type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="n/a" value="{{ $company->email }}">
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
							<form id="edit-form" method="POST" action="/companies/{{ $company->id }}">
								@csrf
								@method('PATCH')

								<div class="row">

									<div class="col-12 col">
										<div class="form-group">
											<label for="name">
												Name
											</label>
											<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ $company->name }}" placeholder="n/a">
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label for="created-at">
												Created On
											</label>
											<input type="text" class="form-control" name="created-at" value="{{ cleanDate($company->created_at) }}" disabled readonly placeholder="n/a">
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										<div class="form-group">
											<label for="updated-at">
												Updated On
											</label>
											<input type="text" class="form-control" name="updated-at" value="{{ $company->updated_at != null ? cleanDate($company->updated_at) : '' }}" disabled readonly placeholder="n/a">
										</div>
									</div> <!-- col -->

									<div class="col-12 col-md-3 col">
										{{-- COMPANY TYPE DROPDOWN --}}
										<div class="form-group">
											<label for="company_type_id">
												Company Type
												<span class="required">*</span>
											</label>
											<select class="form-control" id="company_type_id" name="company_type_id">
												<option value="">None</option>
												@foreach($company_types as $id => $company_type)
												<option value="{{ $id }}" {{ $company->company_type_id == $id ? 'selected' : '' }}>
													{{ $company_type }}
												</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-3 col">
										{{-- STATUS DROPDOWN --}}
										<div class="form-group">
											<label for="status_id">
												Company Status
												<span class="required">*</span>
											</label>
											<select class="form-control" id="status_id" name="status_id">
												@foreach($statuses as $id => $status)
												<option value="{{ $id }}" {{ $company->status_id == $id ? 'selected' : '' }}>
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
										{{-- COMPANY STREET_1 --}}
										<div class="form-group">
											<label>
												Street Address
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $company->street_1 }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- COMPANY STREET_2 --}}
										<div class="form-group">
											<label>
												Street Address 2
												<span class="optional">(optional)</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $company->street_2 }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY CITY --}}
										<div class="form-group">
											<label>
												City
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $company->city }}" placeholder="n/a">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY STATE --}}
										<div class="form-group">
											<label>
												State
												<span class="required">*</span>
											</label>
											<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $company->state }}">
												@foreach ($states as $abbr => $name)
												<option value="{{$abbr}}" {{ $company->state == "$abbr" ? 'selected' : '' }}>{{ $name }}</option>
												@endforeach
											</select>
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY ZIP --}}
										<div class="form-group">
											<label>
												ZIP
												<span class="required">*</span>
											</label>
											<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="n/a" value="{{ $company->zip }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col">
										<h4 class="heading divider">
											<i class="fas fa-info-circle"></i>
											Information
										</h4>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY INCORP_DATE --}}
										<div class="form-group">
											<label>Incorporated Date</label>
											<div class="input-group">
												<input type="date" class="form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="n/a" value="{{ $company->incorp_date != null ? cleanDatePicker($company->incorp_date) : '' }}">
											</div> <!-- input group -->
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY CORP_ID --}}
										<div class="form-group">
											<label>Corporation ID</label>
											<input type="text" class="form-control {{ $errors->has('corp_id') ? 'has-error' : '' }}" name="corp_id" placeholder="n/a" value="{{ $company->corp_id }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-4 col">
										{{-- COMPANY FED_TAX_ID --}}
										<div class="form-group">
											<label>Federal Tax ID</label>
											<input type="text" class="form-control {{ $errors->has('fed_tax_id') ? 'has-error' : '' }}" name="fed_tax_id" placeholder="n/a" value="{{ $company->fed_tax_id }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- COMPANY CITY_LIC --}}
										<div class="form-group">
											<label>City License</label>
											<input type="text" class="form-control {{ $errors->has('city_lic') ? 'has-error' : '' }}" name="city_lic" placeholder="n/a" value="{{ $company->city_lic }}">
										</div>
									</div> <!-- col -->
									<div class="col-12 col-md-6 col">
										{{-- COMPANY COUNTY_LIC --}}
										<div class="form-group">
											<label>County License</label>
											<input type="text" class="form-control {{ $errors->has('county_lic') ? 'has-error' : '' }}" name="county_lic" placeholder="n/a" value="{{ $company->county_lic }}">
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
