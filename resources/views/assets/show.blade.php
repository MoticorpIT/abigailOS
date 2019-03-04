@extends('layouts.app')

@section('ajax-scripts')
<script src="{{ asset('/js/ajax.js') }}"></script>
@endsection

@section('content')
<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			{{ csrf_field() }}

			<nav aria-label="breadcrumb" class="d-none d-sm-block">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/dashboard/">
							Dashboard
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/assets/">
							Asset Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Asset Profile<span class="d-none d-sm-inline">: {{ $asset->name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-briefcase"></i> Asset Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/assets/" class="btn btn-round">Go Back</a>
					<a href="/assets/{{ $asset->id }}/edit" class="btn btn-primary">
						<i class="fas fa-edit"></i>
						Edit Asset
					</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">

				<section class="profile-head">
					<div class="row subhead no-gutters">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="profile-heading heading">{{ $asset->name }}</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								<a href="#0" class="" data-toggle="modal" data-target="#update-images">
									@if ($profile_image == null)
										<img src="https://via.placeholder.com/400x400" alt="Default Image" />
									@else
										<img src="{{ $profile_image_url ?? '' }}" alt="{{ $asset->name }} Profile Image" />
									@endif
								</a>
							</div> <!-- profile image -->
							<div class="col-12 col profile-image-updater">
								{{-- Asset image --}}
								<div class="form-group">
									<a href="#0" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update-images">
										<i class="fas fa-images"></i> View Images
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
									<a class="nav-item nav-link" id="docs-tab-button" data-toggle="tab" href="#docs-tab-content" role="tab" aria-controls="docs-tab" aria-selected="false">
										<i class="fas fa-copy"></i>
									</a>
								</div>
							</nav>
							<div class="tab-content profile-tabs-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="phone-tab-content" role="tabpanel" aria-labelledby="phone-tab-button">
									{{-- Asset PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
										</label>
										<div class="input-group">
											<input class="form-control" name="phone_1" value="{{ $asset->phone_1 }}" readonly disabled placeholder="n/a">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
									{{-- Asset PHONE_2 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 2
										</label>
										<div class="input-group">
											<input class="form-control" name="phone_2" value="{{ $asset->phone_2 }}" placeholder="n/a" readonly disabled >
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
									{{-- Asset FAX --}}
									<div class="form-group">
										<label>
											<i class="fas fa-fax d-lg-none"></i>
											Fax
										</label>
										<div class="input-group">
											<input class="form-control" name="fax" value="{{ $asset->fax }}" placeholder="n/a" readonly disabled>
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-fax"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
									{{-- Asset EMAIL --}}
									<div class="form-group">
										<label>
											<i class="fas fa-at d-lg-none"></i>
											Email
										</label>
										<div class="input-group">
											<input class="form-control" name="email" value="{{ $asset->email }}" placeholder="n/a" readonly disabled>
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-at"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="docs-tab-content" role="tabpanel" aria-labelledby="docs-tab-button">
									{{-- Asset EMAIL --}}
									<div class="form-group">
										<label class="ml-1">
											<i class="fas fa-copy"></i>
											Documents
										</label>
										<ul class="reset assoc-list doc mt-1">
											<li class="assoc-list-item">
												<a href="#0" class="assoc-list-link">
													<i class="fas fa-file-word"></i>
													<span class="assoc-list-span">Word Document</span>
												</a>
											</li>
											<li class="assoc-list-item">
												<a href="#0" class="assoc-list-link">
													<i class="fas fa-file-invoice"></i>
													<span class="assoc-list-span">Invoice Document</span>
												</a>
											</li>
											<li class="assoc-list-item">
												<a href="#0" class="assoc-list-link">
													<i class="fas fa-file-pdf"></i>
													<span class="assoc-list-span">PDF Document</span>
												</a>
											</li>
											<li class="assoc-list-item">
												<a href="#0" class="assoc-list-link">
													<i class="fas fa-file-contract"></i>
													<span class="assoc-list-span">Contract Document</span>
												</a>
											</li>
										</ul>
									</div>
									<div class="form-group">
										<a href="#0" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update-documents">
											<i class="fas fa-copy"></i> Update Documents
										</a>
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
										<i class="fas fa-file-alt"></i>
										Contracts
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
										@foreach($contracts as $contract)
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
													{{ $contract->tenant->last_name }}, {{ $contract->tenant->first_name }}
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
								<div class="col-12 col-md-3 col">
									{{-- Asset Type --}}
									<div class="form-group">
										<label>
											Created On
										</label>
										<input class="form-control" name="created-at" value="{{ $asset->created_at->format('m/d/y') }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Type --}}
									<div class="form-group">
										<label>
											Updated On
										</label>
										<input class="form-control" name="updated-at" value="{{ $asset->updated_at->format('m/d/y') }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Type --}}
									<div class="form-group">
										<label>
											Asset Type
										</label>
										<input class="form-control" name="asset-type" value="{{ $asset->assetType->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Status --}}
									<div class="form-group">
										<label>
											Asset Status
										</label>
										<input class="form-control" name="asset-status" value="{{ $asset->status->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-globe-americas"></i>
										Address
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Asset STREET_1 --}}
									<div class="form-group">
										<label>
											Street Address
										</label>
										<input class="form-control" name="street_1" value="{{ $asset->street_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Asset STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
										</label>
										<input class="form-control" name="street_2" value="{{ $asset->street_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset CITY --}}
									<div class="form-group">
										<label>
											City
										</label>
										<input class="form-control" name="city" value="{{ $asset->city }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset STATE --}}
									<div class="form-group">
										<label>
											State
										</label>
										<select class="form-control" name="state" value="{{ $asset->state }}" readonly disabled>
											<option value="" selected>{{ $asset->state }}</option>
										</select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset ZIP --}}
									<div class="form-group">
										<label>
											ZIP
										</label>
										<input class="form-control" name="zip" value="{{ $asset->zip }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-info-circle"></i>
										Information
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Company Name --}}
									<div class="form-group">
										<label>
											Company
										</label>
										<input class="form-control" name="company-name" value="{{ $asset->company->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Company Name --}}
									<div class="form-group">
										<label>
											Acquired Date
										</label>
										<input class="form-control" name="acquired-date" value="{{ $asset->acquired_date }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Rent --}}
									<div class="form-group">
										<label>
											Asset Rent
										</label>
										<input class="form-control" name="rent" value="${{ $asset->rent }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Deposit --}}
									<div class="form-group">
										<label>
											Asset Deposit
										</label>
										<input class="form-control" name="deposit" value="${{ $asset->deposit }}" placeholder="n/a" readonly disabled>
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

<!-- Images Modal -->
@include('layouts/modals/images-view')
<!-- ADD NOTES MODEL -->
@include('layouts/modals/note-add')

@endsection
