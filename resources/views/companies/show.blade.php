@extends('layouts.app')

@section('ajax-scripts')
<script src="{{ asset('/js/ajax.js') }}"></script>
@endsection

@section('content')

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
						Company Profile<span class="d-none d-sm-inline">: {{ $company->name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-building"></i>
				Company Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/companies/" class="btn btn-round">Go Back</a>
					<a href="/companies/{{ $company->id }}/edit" class="btn btn-primary">
						<i class="fas fa-edit"></i>
						Edit Company
					</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">

				<section class="profile-head">
					<div class="row subhead no-gutters">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading d-block d-sm-none">{{ $company->name }}</h2>
							<h2 class="heading d-none d-sm-block">
								<i class="fas fa-building "></i>
								Company Profile
							</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">

						{{-- LEFT COLUMN CONTENT --}}
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								@if ($company->logo_id == null)
									<img src="/media/images/company-default-logo-profile.png" alt="Default Company Logo" />
								@else
									<img src="{{ $company->logo->getURL('profile') ?? '' }}" alt="{{ $company->name }}s Logo" />
								@endif
							</div> <!-- profile image -->

							{{-- Contact Tabs --}}
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
										</label>
										<div class="input-group">
											<input type="tel" class="form-control" name="phone_1" value="{{ cleanPhone($company->phone_1) }}" disabled readonly placeholder="n/a">
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
										</label>
										<div class="input-group">
											<input type="tel" class="form-control" name="phone_2" value="{{ cleanPhone($company->phone_2) }}" disabled readonly placeholder="n/a">
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
											<input type="tel" class="form-control" name="fax" value="{{ cleanPhone($company->fax) }}" disabled readonly placeholder="n/a">
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
											<input type="email" class="form-control" name="email" value="{{ $company->email }}" disabled readonly placeholder="n/a">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-at"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							{{-- Associated Tabs --}}
							<nav class="profile-tabs associated">
								<div class="nav nav-pills nav-justified" id="assoc-nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="assoc-acc-tab-button" data-toggle="tab" href="#assoc-acc-tab-content" role="tab" aria-controls="assoc-nav-tab" aria-selected="true">
										<i class="fas fa-file-alt"></i>
										Accounts
									</a>
									<a class="nav-item nav-link" id="assoc-ass-tab-button" data-toggle="tab" href="#assoc-ass-tab-content" role="tab" aria-controls="assoc-nav-tab" aria-selected="false">
										<i class="fas fa-briefcase"></i>
										Assets
									</a>
									<a class="nav-item nav-link d-sm-none" id="assoc-hide-tab-button" data-toggle="tab" href="#assoc-hide-tab-content" role="tab" aria-selected="false">
										<i class="fas fa-minus-square"></i>
									</a>
								</div>
							</nav>
							<div class="tab-content profile-tabs-content" id="">
								<div class="tab-pane fade show active" id="assoc-acc-tab-content" role="tabpanel" aria-labelledby="assoc-acc-tab-button">
									<ul class="reset assoc-list acc">
										@foreach($accounts as $account)
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
													{{ $account->name }}
												</span>
											</a>
										</li>
										@endforeach
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-ass-tab-content" role="tabpanel" aria-labelledby="assoc-ass-tab-button">
									<ul class="reset assoc-list acc">
										@foreach($assets as $asset)
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
													{{ $asset->name }}
												</span>
											</a>
										</li>
										@endforeach
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-hide-tab-content" role="tabpanel" aria-labelledby="assoc-hide-tab-button">
								</div>
							</div>
						</div> <!-- col -->

						{{-- RIGHT COLUMN CONTENT --}}
						<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
							<div class="row">
								<div class="col-12 col">
									<div class="form-group">
										<label for="name">
											Name
										</label>
										<input type="text" class="form-control" name="name" disabled readonly placeholder="n/a" value="{{ $company->name }}">
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

								{{-- COMPANY TYPE DROPDOWN --}}
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label for="company_type_id">
											Company Type
										</label>
										<input type="text" class="form-control" name="type" value="{{ $company->companyType->name }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- STATUS DROPDOWN --}}
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label for="status_id">
											Company Status
										</label>
										<input type="text" class="form-control" name="status" value="{{ $company->status->name}}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- ADDRESS SECTION HEADING --}}
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-globe-americas"></i>
										Address
									</h4>
								</div> <!-- col -->

								{{-- COMPANY STREET_1 --}}
								<div class="col-12 col-md-6 col">
									<div class="form-group">
										<label>
											Street Address
										</label>
										<input type="text" class="form-control" name="street_1" value="{{ $company->street_1 }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY STREET_2 --}}
								<div class="col-12 col-md-6 col">
									<div class="form-group">
										<label>
											Street Address 2
										</label>
										<input type="text" class="form-control" name="street_2" value="{{ $company->street_2 }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY CITY --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>
											City
										</label>
										<input type="text" class="form-control" name="city" value="{{ $company->city }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY STATE --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>
											State
										</label>
										<select class="form-control" name="state" value="{{ $company->state }}" readonly disabled>
											<option value="" selected>{{ $company->state }}</option>
										</select>
									</div>
								</div> <!-- col -->

								{{-- COMPANY ZIP --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>
											ZIP
										</label>
										<input type="text" class="form-control" name="zip" value="{{ $company->zip }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- INFORMATION SECTION HEADING --}}
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-info-circle"></i>
										Information
									</h4>
								</div> <!-- col -->

								{{-- COMPANY INCORP_DATE --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>Incorporated Date</label>
										<input type="text" class="form-control" name="incorp_date" value="{{ $company->incorp_date != null ? cleanDate($company->incorp_date) : '' }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY CORP_ID --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>Corporation ID</label>
										<input type="text" class="form-control" name="corp_id" value="{{ $company->corp_id }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY FED_TAX_ID --}}
								<div class="col-12 col-md-4 col">
									<div class="form-group">
										<label>Federal Tax ID</label>
										<input type="text" class="form-control" name="fed_tax_id" value="{{ $company->fed_tax_id }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY CITY_LIC --}}
								<div class="col-12 col-md-6 col">
									<div class="form-group">
										<label>City License</label>
										<input type="text" class="form-control" name="city_lic" value="{{ $company->city_lic }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- COMPANY COUNTY_LIC --}}
								<div class="col-12 col-md-6 col">
									<div class="form-group">
										<label>County License</label>
										<input type="text" class="form-control" name="county_lic" value="{{ $company->county_lic }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								{{-- NOTES SECTION - WHICH INCLUDES LAYOUTS/MODALS/NOTE-EDIT --}}
								@include('layouts/components/notes')

							</div> <!-- row - right column content -->
						</div> <!-- col - right column content -->
					</div> <!-- row -->

				</section>

			</div> <!-- profile wrapper -->

		</form>
	</div> <!-- db-box -->
</div> <!-- col -->
</div> <!-- db boxes -->

<!-- ADD NOTES MODEL -->
@include('layouts/modals/note-add')

@endsection
