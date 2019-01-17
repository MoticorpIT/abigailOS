@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/companies" enctype="multipart/form-data">
				{{ csrf_field() }}

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
							Create Company
						</li>
				  </ol>
				</nav>

			<h1 class="page-heading">
				Add New Company

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="{{ route('companies.index') }}" class="btn btn-round">Cancel</a>
					<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
						<i class="fas fa-check-circle"></i>
						Save Company
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
								<img src="https://via.placeholder.com/400x400" />
							</div> <!-- profile image -->

							<div class="col-12 col profile-image-updater">
								{{-- COMPANY LOGO --}}
								<div class="form-group">
									<label>
										Logo
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
									{{-- COMPANY PHONE_1 --}}
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
									{{-- COMPANY PHONE_2 --}}
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
									{{-- COMPANY FAX --}}
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
									{{-- COMPANY EMAIL --}}
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
										<input class="form-control" name="created-at" value="Now" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label>
											Updated On
										</label>
										<input class="form-control" name="updated-at" value="n/a" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- COMPANY Type --}}
									<div class="form-group">
										<label for="company_type_id">
											Company Type
											<span class="required">*</span>
										</label>
										<select class="form-control {{ $errors->has('company_type_id') ? 'has-error' : '' }}" id="company_type_id" name="company_type_id">
											<option value="" selected>Choose One</option>
											@foreach($company_types as $id => $company_type)
												<option value="{{ $id }}">{{ $company_type }}</option>
											@endforeach
										</select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label>
											Company Status
										</label>
                    <select class="form-control" id="status_id" name="status_id" readonly disabled>
											<option selected>Active</option>
										</select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY TYPE DROPDOWN --}}

								</div> <!-- col -->
								 <!-- col -->
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
										<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" placeholder="123 Fake St" value="{{ old('street_1') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" placeholder="Apt 404" value="{{ old('street_2') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" placeholder="Myrtle Beach" value="{{ old('city') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY STATE --}}
									<div class="form-group">
									    <label>
									        State
									        <span class="required">*</span>
									    </label>
									    <input type="text" class="d-none form-control" name="state" placeholder="South Carolina" value="{{ old('state') }}">
									    <select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ old('state') }}">
									        <option value="" selected>Choose One</option>
									        @foreach ($states as $abbr => $name)
									            <option value="{{$abbr}}">{{ $name }}</option>
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
										<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="29577" value="{{ old('zip') }}">
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
										<input type="text" class="d-none form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="Date Company was Incorporated" value="{{ old('incorp_date') }}">
										<div class="input-group">
						                  <input type="date" class="form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="01/01/2010" value="{{ old('incorp_date') }}">
						                  <div class="input-group-append">
						                    <div class="input-group-text">
						                      <i class="fas fa-calendar-alt"></i>
						                    </div>
						                  </div>
						                </div> <!-- input group -->
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY CORP_ID --}}
									<div class="form-group">
										<label>Corporation ID</label>
										<input type="text" class="form-control {{ $errors->has('corp_id') ? 'has-error' : '' }}" name="corp_id" placeholder="Corporation ID" value="{{ old('corp_id') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY FED_TAX_ID --}}
									<div class="form-group">
										<label>Federal Tax ID</label>
										<input type="text" class="form-control {{ $errors->has('fed_tax_id') ? 'has-error' : '' }}" name="fed_tax_id" placeholder="Federal Tax ID" value="{{ old('fed_tax_id') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY CITY_LIC --}}
									<div class="form-group">
										<label>City License</label>
										<input type="text" class="form-control {{ $errors->has('city_lic') ? 'has-error' : '' }}" name="city_lic" placeholder="City License" value="{{ old('city_lic') }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY COUNTY_LIC --}}
									<div class="form-group">
										<label>County License</label>
										<input type="text" class="form-control {{ $errors->has('county_lic') ? 'has-error' : '' }}" name="county_lic" placeholder="County License" value="{{ old('county_lic') }}">
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
