@extends('layouts.app')

@section('ajax-scripts')
    <script src="{{ asset('/js/ajax.js') }}"></script>
@endsection

@section('content')
<style>
.has-error { border-color: red; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				Tenant Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="" class="btn btn-round">Go Back</a>
					<a href="/tenants/{{ $tenant->id }}/edit" id="submit-btn" class="btn btn-primary d-block d-sm-inline">Edit Tenant</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">
				@include('layouts.errors')

				<section class="profile-head">
					<div class="row subhead">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">{{ $tenant->first_name }} {{ $tenant->last_name }}</h2>
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
							        <input class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ $tenant->phone_1 }}" readonly disabled placeholder="n/a">
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
							        <input class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ $tenant->phone_2 }}" placeholder="n/a" readonly disabled >
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
							        <input class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ $tenant->fax }}" placeholder="n/a" readonly disabled>
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
							        <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $tenant->email }}" placeholder="n/a" readonly disabled>
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
										Contracts
									</a>
									<a class="nav-item nav-link" id="assoc-ass-tab-button" data-toggle="tab" href="#assoc-ass-tab-content" role="tab" aria-controls="assoc-nav-tab" aria-selected="false">
										<i class="fas fa-briefcase"></i>
										Undecided
									</a>
									<a class="nav-item nav-link d-sm-none" id="assoc-hide-tab-button" data-toggle="tab" href="#assoc-hide-tab-content" role="tab" aria-selected="false">
										<i class="fas fa-minus-square"></i>
									</a>
								</div>
							</nav>
							<div class="tab-content profile-tabs-content" id="">
								<div class="tab-pane fade show active" id="assoc-acc-tab-content" role="tabpanel" aria-labelledby="assoc-acc-tab-button">
									<ul class="reset assoc-list acc">
									@foreach($contracts as $contract)
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
													{{ $contract->asset->name }}
												</span>
											</a>
										</li>
									@endforeach
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-ass-tab-content" role="tabpanel" aria-labelledby="assoc-ass-tab-button">
									<ul class="reset assoc-list acc">
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
													Undecided
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-hide-tab-content" role="tabpanel" aria-labelledby="assoc-hide-tab-button">
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
										<input class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ $tenant->first_name }}" placeholder="n/a" readonly disabled >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant Last Name --}}
									<div class="form-group">
										<label>
											Last Name
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ $tenant->last_name }}" placeholder="n/a" readonly disabled>
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
										<input class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ $tenant->co_first_name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Co-Tenant Last Name --}}
									<div class="form-group">
										<label>Co-Tenant Last Name:</label>
										<input class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ $tenant->co_last_name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 1 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 1:</label>
										<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ $tenant->co_phone_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 2 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 2:</label>
										<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ $tenant->co_phone_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Email --}}
									<div class="form-group">
										<label>Co-Tenant Email:</label>
										<input class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ $tenant->co_email }}" placeholder="n/a" readonly disabled>
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
										<input class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $tenant->street_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $tenant->street_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Tenant CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $tenant->city }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- TENANT STATE --}}
									<div class="form-group">
									    <label>
									        State
									        <span class="required">*</span>
									    </label>
									    <input class="d-none form-control" name="state" value="{{ $tenant->state }}">
									    <select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $tenant->state }}" readonly disabled>
									        <option value="" selected>{{ $tenant->state }}</option>
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
										<input class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ $tenant->zip }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->

								{{-- NOTES SECTION - WHICH INCLUDES LAYOUTS/MODALS/NOTE-EDIT --}}
								@include('layouts/components/notes')

							</div> <!-- row -->
						</div> <!-- col -->
					</div> <!-- row -->

				</section>

			</div> <!-- profile wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

<!-- ADD NOTE MODAL -->
@include('layouts/modals/note-add')

@endsection
