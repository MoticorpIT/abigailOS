@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/tenants/{{ $tenant->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

			<nav aria-label="breadcrumb" class="d-none d-sm-block">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/dashboard/">
							Dashboard
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/tenants/">
							Tenant Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Edit Tenant<span class="d-none d-sm-inline">: {{ $tenant->first_name }} {{ $tenant->last_name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				Edit Tenant

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/tenants/" class="btn btn-round">
						Go Back
					</a>
          <a href="/tenants/{{ $tenant->id }}" class="btn btn-secondary">
						<i class="fas fa-eye"></i>
						View Tenant
					</a>
          <button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">
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
										<input type="text" class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="name" value="{{ $tenant->first_name }}" placeholder="First Name">
									</div> <!-- col -->
									<div class="col-12 col-md-6">
										<input type="text" class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="name" value="{{ $tenant->last_name }}" placeholder="Last Name">
									</div> <!-- col -->
								</div> <!-- row -->
							</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								<a href="#0" class="" data-toggle="modal" data-target="#update-images">
									<img src="https://via.placeholder.com/400x400" />
								</a>
							</div> <!-- profile image -->

              <div class="col-12 col profile-image-updater">
							  {{-- Asset image --}}
							  <div class="form-group">
                  <a href="#0" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update-images">
                    <i class="fas fa-images"></i> Update Images
                  </a>
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
							        <input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="n/a" value="{{ $tenant->phone_1 }}">
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
							        <input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="n/a" value="{{ $tenant->phone_2 }}">
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
							        <input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="n/a" value="{{ $tenant->fax }}">
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
							        <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="n/a" value="{{ $tenant->email }}">
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
										<label for="created-at">
											Created On
										</label>
										<input type="text" class="form-control" name="created-at" value="{{ $tenant->created_at->format('m/d/y') }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

                <div class="col-12 col-md-3 col">
									<div class="form-group">
										<label for="updated-at">
											Updated On
										</label>
										<input type="text" class="form-control" name="updated-at" value="{{ $tenant->updated_at->format('m/d/y') }}" disabled readonly placeholder="n/a">
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
										<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ $tenant->co_phone_1 }}" placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 2 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 2:</label>
										<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ $tenant->co_phone_2 }}" placeholder="n/a">
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
						</div> <!-- col -->
					</div> <!-- row -->

				</section>

			</div> <!-- profile wrapper -->

			</form>
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

<!-- Images Modal -->
@include('layouts/modals/view-images')
@endsection
