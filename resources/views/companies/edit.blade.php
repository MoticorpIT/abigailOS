@extends('layouts.app')

@section('content')
<style>
.has-error { border-color: red; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/companies/{{ $company->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
			<h1 class="page-heading">
				Edit Company

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="{{ route('companies.index') }}" class="btn btn-round">Cancel</a>
					<a href="/companies/{{ $company->id }}" class="btn btn-secondary d-block d-sm-inline">View Company</a>
					<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save Company</button>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">
				@include('layouts.errors')

				<section class="profile-head">
					<div class="row subhead">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">{{ $company->name }}</h2>
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
							        <input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="n/a" value="{{ $company->phone_1 }}">
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
							        <input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="n/a" value="{{ $company->phone_2 }}">
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
							        <input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="n/a" value="{{ $company->fax }}">
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
							        <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="n/a" value="{{ $company->email }}">
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
									{{-- COMPANY NAME --}}
									<div class="form-group">
										<label>
											Name
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ $company->name }}" autofocus placeholder="n/a">
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
											@foreach($company_types as $company_type)
												<option value="{{ $company_type->id }}" {{ $company_type->id == $company->company_type_id ? 'selected' : '' }}>
													{{ $company_type->name }}
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
											@foreach($statuses as $status)
												<option value="{{ $status->id }}" {{ $status->id == $status->status_id ? 'selected' : '' }}>
													{{ $status->name }}
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
										<input type="text" class="d-none form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $company->state }}" placeholder="n/a">
										<select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $company->state }}">
											<option value="AL" {{ $company->state == "AL" ? 'selected' : '' }}>Alabama</option>
											<option value="AK" {{ $company->state == "AK" ? 'selected' : '' }}>Alaska</option>
											<option value="AZ" {{ $company->state == "AZ" ? 'selected' : '' }}>Arizona</option>
											<option value="AR" {{ $company->state == "AR" ? 'selected' : '' }}>Arkansas</option>
											<option value="CA" {{ $company->state == "CA" ? 'selected' : '' }}>California</option>
											<option value="CO" {{ $company->state == "CO" ? 'selected' : '' }}>Colorado</option>
											<option value="CT" {{ $company->state == "CT" ? 'selected' : '' }}>Connecticut</option>
											<option value="DE" {{ $company->state == "DE" ? 'selected' : '' }}>Delaware</option>
											<option value="DC" {{ $company->state == "DC" ? 'selected' : '' }}>District Of Columbia</option>
											<option value="FL" {{ $company->state == "FL" ? 'selected' : '' }}>Florida</option>
											<option value="GA" {{ $company->state == "GA" ? 'selected' : '' }}>Georgia</option>
											<option value="HI" {{ $company->state == "HI" ? 'selected' : '' }}>Hawaii</option>
											<option value="ID" {{ $company->state == "ID" ? 'selected' : '' }}>Idaho</option>
											<option value="IL" {{ $company->state == "IL" ? 'selected' : '' }}>Illinois</option>
											<option value="IN" {{ $company->state == "IN" ? 'selected' : '' }}>Indiana</option>
											<option value="IA" {{ $company->state == "IA" ? 'selected' : '' }}>Iowa</option>
											<option value="KS" {{ $company->state == "KS" ? 'selected' : '' }}>Kansas</option>
											<option value="KY" {{ $company->state == "KY" ? 'selected' : '' }}>Kentucky</option>
											<option value="LA" {{ $company->state == "LA" ? 'selected' : '' }}>Louisiana</option>
											<option value="ME" {{ $company->state == "ME" ? 'selected' : '' }}>Maine</option>
											<option value="MD" {{ $company->state == "MD" ? 'selected' : '' }}>Maryland</option>
											<option value="MA" {{ $company->state == "MA" ? 'selected' : '' }}>Massachusetts</option>
											<option value="MI" {{ $company->state == "MI" ? 'selected' : '' }}>Michigan</option>
											<option value="MN" {{ $company->state == "MN" ? 'selected' : '' }}>Minnesota</option>
											<option value="MS" {{ $company->state == "MS" ? 'selected' : '' }}>Mississippi</option>
											<option value="MO" {{ $company->state == "MO" ? 'selected' : '' }}>Missouri</option>
											<option value="MT" {{ $company->state == "MT" ? 'selected' : '' }}>Montana</option>
											<option value="NE" {{ $company->state == "NE" ? 'selected' : '' }}>Nebraska</option>
											<option value="NV" {{ $company->state == "NV" ? 'selected' : '' }}>Nevada</option>
											<option value="NH" {{ $company->state == "NH" ? 'selected' : '' }}>New Hampshire</option>
											<option value="NJ" {{ $company->state == "NJ" ? 'selected' : '' }}>New Jersey</option>
											<option value="NM" {{ $company->state == "NM" ? 'selected' : '' }}>New Mexico</option>
											<option value="NY" {{ $company->state == "NY" ? 'selected' : '' }}>New York</option>
											<option value="NC" {{ $company->state == "NC" ? 'selected' : '' }}>North Carolina</option>
											<option value="ND" {{ $company->state == "ND" ? 'selected' : '' }}>North Dakota</option>
											<option value="OH" {{ $company->state == "OH" ? 'selected' : '' }}>Ohio</option>
											<option value="OK" {{ $company->state == "OK" ? 'selected' : '' }}>Oklahoma</option>
											<option value="OR" {{ $company->state == "OR" ? 'selected' : '' }}>Oregon</option>
											<option value="PA" {{ $company->state == "PA" ? 'selected' : '' }}>Pennsylvania</option>
											<option value="RI" {{ $company->state == "RI" ? 'selected' : '' }}>Rhode Island</option>
											<option value="SC" {{ $company->state == "SC" ? 'selected' : '' }}>South Carolina</option>
											<option value="SD" {{ $company->state == "SD" ? 'selected' : '' }}>South Dakota</option>
											<option value="TN" {{ $company->state == "TN" ? 'selected' : '' }}>Tennessee</option>
											<option value="TX" {{ $company->state == "TX" ? 'selected' : '' }}>Texas</option>
											<option value="UT" {{ $company->state == "UT" ? 'selected' : '' }}>Utah</option>
											<option value="VT" {{ $company->state == "VT" ? 'selected' : '' }}>Vermont</option>
											<option value="VA" {{ $company->state == "VA" ? 'selected' : '' }}>Virginia</option>
											<option value="WA" {{ $company->state == "WA" ? 'selected' : '' }}>Washington</option>
											<option value="WV" {{ $company->state == "WV" ? 'selected' : '' }}>West Virginia</option>
											<option value="WI" {{ $company->state == "WI" ? 'selected' : '' }}>Wisconsin</option>
											<option value="WY" {{ $company->state == "WY" ? 'selected' : '' }}>Wyoming</option>
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
										<input type="text" class="d-none form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="n/a" value="{{ $company->incorp_date }}">
										<div class="input-group">
		                  <input type="date" class="form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="n/a" value="{{ $company->incorp_date }}">
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
						</div> <!-- col -->
					</div> <!-- row -->

				</section>

			</div> <!-- profile wrapper -->

			</form>
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->





<div class="d-none">

	<h1>Edit Company</h1>

	@include('layouts.errors')

	<form method="POST" action="/companies/{{ $company->id }}">

		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="row mb-5">
			<div class="col-md-6">
				{{-- COMPANY NAME --}}
				<div class="form-group">
					<label>Name *</label>
					<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" value="{{ $company->name }}" autofocus>
				</div>
				{{-- COMPANY STREET_1 --}}
				<div class="form-group">
					<label>Street *</label>
					<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $company->street_1 }}">
				</div>
				{{-- COMPANY STREET_2 --}}
				<div class="form-group">
					<label>Street (optional)</label>
					<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $company->street_2 }}">
				</div>
				{{-- COMPANY CITY --}}
				<div class="form-group">
					<label>City *</label>
					<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $company->city }}">
				</div>
				{{-- COMPANY STATE --}}
				<div class="form-group">
					<label>State *</label>
					<input type="text" class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $company->state }}">
				</div>
				{{-- COMPANY ZIP --}}
				<div class="form-group">
					<label>Zip *</label>
					<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ $company->zip }}">
				</div>
			</div>

			<div class="col-md-6">
				{{-- COMPANY PHONE_1 --}}
				<div class="form-group">
					<label>Phone *</label>
					<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ $company->phone_1 }}">
				</div>
				{{-- COMPANY PHONE_2 --}}
				<div class="form-group">
					<label>Phone (optional)</label>
					<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ $company->phone_2 }}">
				</div>
				{{-- COMPANY FAX --}}
				<div class="form-group">
					<label>Fax</label>
					<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ $company->fax }}">
				</div>
				{{-- COMPANY EMAIL --}}
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $company->email }}">
				</div>
				{{-- COMPANY LOGO --}}
				<div class="form-group">
					<label>Logo - This should be an uploader</label>
					<input type="file" class="form-control {{ $errors->has('logo') ? 'has-error' : '' }}" name="logo" value="{{ $company->logo }}">
				</div>
			</div>

		</div>
		<div class="row mb-5">

			<div class="col-md-6">
				{{-- COMPANY INCORP_DATE --}}
				<div class="form-group">
					<label>Incorporated Date</label>
					<input type="text" class="form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" value="{{ $company->incorp_date }}">
				</div>
				{{-- COMPANY CORP_ID --}}
				<div class="form-group">
					<label>Corporation ID</label>
					<input type="text" class="form-control {{ $errors->has('corp_id') ? 'has-error' : '' }}" name="corp_id" value="{{ $company->corp_id }}">
				</div>
				{{-- COMPANY CITY_LIC --}}
				<div class="form-group">
					<label>City License</label>
					<input type="text" class="form-control {{ $errors->has('city_lic') ? 'has-error' : '' }}" name="city_lic" value="{{ $company->city_lic }}">
				</div>
				{{-- COMPANY COUNTY_LIC --}}
				<div class="form-group">
					<label>County License</label>
					<input type="text" class="form-control {{ $errors->has('county_lic') ? 'has-error' : '' }}" name="county_lic" value="{{ $company->county_lic }}">
				</div>
				{{-- COMPANY FED_TAX_ID --}}
				<div class="form-group">
					<label>Federal Tax Id</label>
					<input type="text" class="form-control {{ $errors->has('fed_tax_id') ? 'has-error' : '' }}" name="fed_tax_id" value="{{ $company->fed_tax_id }}">
				</div>
			</div>


			<div class="col-md-6">
				{{-- COMPANY TYPE DROPDOWN --}}
				<div class="form-group">
					<label for="company_type_id">Company Type *</label>
					<select class="form-control" id="company_type_id" name="company_type_id">
						<option value="">None</option>
						@foreach($company_types as $company_type)
							<option value="{{ $company_type->id }}" {{ $company_type->id == $company->company_type_id ? 'selected' : '' }}>
								{{ $company_type->name }}
							</option>
						@endforeach
					</select>
				</div>
				{{-- STATUS DROPDOWN --}}
				<div class="form-group">
					<label for="status_id">Company Type *</label>
					<select class="form-control" id="status_id" name="status_id">
						@foreach($statuses as $status)
							<option value="{{ $status->id }}" {{ $status->id == $status->status_id ? 'selected' : '' }}>
								{{ $status->name }}
							</option>
						@endforeach
					</select>
				</div>
			</div>

		</div>
		{{-- BUTTON SET --}}
		<div class="row mb-5">
			<div class="col-md-12">
				<a href="{{ route('companies.index') }}" class="btn btn-round">Cancel</a>
				<button id="submit-btn" type="submit" class="btn btn-danger btn-round">Update Company</button>
			</div>
		</div>
	</form>
</div> <!-- hidden -->

@endsection
