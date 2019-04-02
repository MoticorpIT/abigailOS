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
						<a href="/tenants/">
							Tenant Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Tenant Profile<span class="d-none d-sm-inline">: {{ $tenant->first_name }} {{ $tenant->last_name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-users"></i> Tenant Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/tenants/" class="btn btn-round">Go Back</a>
					<a href="/tenants/{{ $tenant->id }}/edit" class="btn btn-primary">
						<i class="fas fa-edit"></i>
						Edit Tenant
					</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">

				<section class="profile-head">
					<div class="row subhead no-gutters">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">{{ $tenant->first_name }} {{ $tenant->last_name }}</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								@if ($tenant->image_id == null)
									<img src="/media/images/tenants-default-image-profile.png" alt="Default Tenants Image" />
								@else
									<img src="{{ $tenant->image->getURL('profile') ?? '' }}" alt="{{ $tenant->name }}s Image" />
								@endif
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
									{{-- Tenant PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
										</label>
										<div class="input-group">
											<input class="form-control" name="phone_1" value="{{ $tenant->phone_1 }}" readonly disabled placeholder="n/a">
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
										</label>
										<div class="input-group">
											<input class="form-control" name="phone_2" value="{{ $tenant->phone_2 }}" placeholder="n/a" readonly disabled >
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
											<input class="form-control" name="fax" value="{{ $tenant->fax }}" placeholder="n/a" readonly disabled>
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
											<input class="form-control" name="email" value="{{ $tenant->email }}" placeholder="n/a" readonly disabled>
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
									<div class="form-group">
										<label for="account-standing">
											Account Standing
										</label>
										<input type="text" class="form-control" name="account-standing" value="{{ $tenant->accountStanding->name }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label for="status">
											Tenant Status
										</label>
										<input type="text" class="form-control" name="status" value="{{ $tenant->status->name }}" disabled readonly placeholder="n/a">
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
										<input class="form-control" name="co_first_name" value="{{ $tenant->co_first_name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Co-Tenant Last Name --}}
									<div class="form-group">
										<label>Co-Tenant Last Name:</label>
										<input class="form-control" name="co_last_name" value="{{ $tenant->co_last_name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 1 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 1:</label>
										<input class="form-control" name="co_phone_1" value="{{ $tenant->co_phone_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Phone 2 --}}
									<div class="form-group">
										<label>Co-Tenant Phone 2:</label>
										<input class="form-control" name="co_phone_2" value="{{ $tenant->co_phone_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Co-Tenant Email --}}
									<div class="form-group">
										<label>Co-Tenant Email:</label>
										<input class="form-control" name="co_email" value="{{ $tenant->co_email }}" placeholder="n/a" readonly disabled>
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
										</label>
										<input class="form-control" name="street_1" value="{{ $tenant->street_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Tenant STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
										</label>
										<input class="form-control" name="street_2" value="{{ $tenant->street_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Tenant CITY --}}
									<div class="form-group">
										<label>
											City
										</label>
										<input class="form-control" name="city" value="{{ $tenant->city }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- TENANT STATE --}}
									<div class="form-group">
										<label>
											State
										</label>
										<input class="d-none form-control" name="state" value="{{ $tenant->state }}">
										<select class="form-control" name="state" value="{{ $tenant->state }}" readonly disabled>
											<option value="" selected>{{ $tenant->state }}</option>
										</select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Tenant ZIP --}}
									<div class="form-group">
										<label>
											ZIP
										</label>
										<input class="form-control" name="zip" value="{{ $tenant->zip }}" placeholder="n/a" readonly disabled>
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
