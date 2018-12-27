@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/companies">
			<h1 class="page-heading">
				Company Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="{{ route('companies.index') }}" class="btn btn-round">Go Back</a>
					<a href="/companies/{{ $company->id }}/edit" id="submit-btn" class="btn btn-primary d-block d-sm-inline">Edit Company</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">

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
											<input type="tel" class="form-control" name="phone_1" value="{{ $company->phone_1 }}" disabled readonly placeholder="n/a">
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
											<input type="tel" class="form-control" name="phone_2" value="{{ $company->phone_2 }}" disabled readonly placeholder="n/a">
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
											<input type="tel" class="form-control" name="fax" value="{{ $company->fax }}" disabled readonly placeholder="n/a">
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
						<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
							<div class="row">
								<div class="col-12 col-md-6 col">
									{{-- COMPANY NAME --}}
									<div class="form-group">
										<label>
											Name
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="name" value="{{ $company->name }}" autofocus disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- COMPANY TYPE DROPDOWN --}}
									<div class="form-group">
										<label for="company_type_id">
											Company Type
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="type" value="{{ $company->companyType->name }}" autofocus disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- STATUS DROPDOWN --}}
									<div class="form-group">
										<label for="status_id">
											Company Status
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="status" value="{{ $company->status->name}}" autofocus disabled readonly placeholder="n/a">
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
										<input type="text" class="form-control" name="street_1" value="{{ $company->street_1 }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input type="text" class="form-control" name="street_2" value="{{ $company->street_2 }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="city" value="{{ $company->city }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY STATE --}}
									<div class="form-group">
										<label>
											State
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="state" value="{{ $company->state }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY ZIP --}}
									<div class="form-group">
										<label>
											ZIP
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="zip" value="{{ $company->zip }}" disabled readonly placeholder="n/a">
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
										<input type="text" class="form-control" name="incorp_date" value="{{ $company->incorp_date }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY CORP_ID --}}
									<div class="form-group">
										<label>Corporation ID</label>
										<input type="text" class="form-control" name="corp_id" value="{{ $company->corp_id }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- COMPANY FED_TAX_ID --}}
									<div class="form-group">
										<label>Federal Tax ID</label>
										<input type="text" class="form-control" name="fed_tax_id" value="{{ $company->fed_tax_id }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY CITY_LIC --}}
									<div class="form-group">
										<label>City License</label>
										<input type="text" class="form-control" name="city_lic" value="{{ $company->city_lic }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- COMPANY COUNTY_LIC --}}
									<div class="form-group">
										<label>County License</label>
										<input type="text" class="form-control" name="county_lic" value="{{ $company->county_lic }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-comment"></i>
										Notes
									</h4>
								</div> <!-- col -->
								<div class="col-12 col">
									<ul class="reset notes-list">
									@foreach($notes as $note)
										<li class="notes-list-item">
											<div class="media">
											  <img src="http://placehold.it/50x50" class="mr-3" />
											  <div class="media-body">
											    <h5 class="mt-0 author">{{ $note->user->name }}</h5>
													<span class="timeago float-right">
														{{ $note->created_at->diffForHumans() }}
													</span>
													<span class="text">
														{{ $note->note }}
													</span>
											  </div>
											</div>



										</li>
									@endforeach
								</ul> <!-- notes list -->
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
	Companies - show.blade.php || <a href="/companies/create">Create company</a>
	<hr>
	<h4>Company Profile</h4>
	<ul>
		<li>id: {{ $company->id }}</li>
		<li>name: {{ $company->name }}</li>
		<li>street_1: {{ $company->street_1 }}</li>
		<li>street_2: {{ $company->street_2 }}</li>
		<li>city: {{ $company->city }}</li>
		<li>state: {{ $company->state }}</li>
		<li>zip: {{ $company->zip }}</li>
		<li>phone_1: {{ $company->phone_1 }}</li>
		<li>phone_2: {{ $company->phone_2 }}</li>
		<li>fax: {{ $company->fax }}</li>
		<li>email: {{ $company->email }}</li>
		<li>logo: {{ $company->logo }}</li>
		<li>incorp_date: {{ $company->incorp_date }}</li>
		<li>corp_id: {{ $company->corp_id }}</li>
		<li>city_lic: {{ $company->city_lic }}</li>
		<li>county_lic: {{ $company->county_lic }}</li>
		<li>fed_tax_id: {{ $company->fed_tax_id }}</li>
		<li>company_type: {{ $company->companyType->name }}</li>
		<li>status: {{ $company->status->name}}</li>
		<li>created_at: {{ $company->created_at }}</li>
		<li>updated_at: {{ $company->updated_at }}</li>
		<li><a href="/companies/{{ $company->id }}/edit">Edit company</a></li>
		<li><a href="/companies">View all companies</a></li>
	</ul>
	<hr>
	<h4>Assets (associated)</h4>
	@foreach($assets as $asset)
		<ul>
			<li>id: {{ $asset->id }}</li>
			<li>name: {{ $asset->name }}</li>
			<li>created_at: {{ $asset->created_at }}</li>
			<li>updated_at: {{ $asset->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Accounts (associated)</h4>
	@foreach($accounts as $account)
		<ul>
			<li>id: {{ $account->id }}</li>
			<li>name: {{ $account->name }}</li>
			<li>created_at: {{ $account->created_at }}</li>
			<li>updated_at: {{ $account->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Notes (associated)</h4>
	@foreach($notes as $note)
		<ul>
			<li>note: {{ $note->note }}</li>
			<li>by: {{ $note->user->name }} {{ $note->created_at->diffForHumans() }}</li>
		</ul>
	@endforeach
</div> <!-- hidden -->
@endsection
