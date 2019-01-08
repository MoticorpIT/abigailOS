@extends('layouts.app')

@section('content')

<style>
.has-error { border-color: red; }
</style>

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<form method="POST" action="/tenants">
				{{ csrf_field() }}
			<h1 class="page-heading">
				Asset Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="" class="btn btn-round">Go Back</a>
					<a href="/assets/{{ $asset->id }}/edit" id="submit-btn" class="btn btn-primary d-block d-sm-inline">Edit Asset</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="profile-wrapper">
				@include('layouts.errors')

				<section class="profile-head">
					<div class="row subhead">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3"></div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<h2 class="heading">{{ $asset->name }}</h2>
						</div>
					</div> <!-- row -->
					<div class="row profile-row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 profile-image-col">
							<div class="profile-image">
								<img src="https://via.placeholder.com/400x400" />
							</div> <!-- profile image -->

							<div class="col-12 col profile-image-updater">
								{{-- Asset image --}}
								<div class="form-group">
									<label>
										<i class="far fa-image"></i> Photo
										<span class="optional">(400 x 400)</span>
									</label>
									<input type="button" class="form-control btn btn-primary" name="Asset Photo" value="Update Image" />
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
									{{-- Asset PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
											<span class="required">*</span>
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ $asset->phone_1 }}" readonly disabled placeholder="n/a">
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
											<span class="optional">(optional)</span>
										</label>
										<div class="input-group">
							        <input class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ $asset->phone_2 }}" placeholder="n/a" readonly disabled >
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
							        <input class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ $asset->fax }}" placeholder="n/a" readonly disabled>
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
							        <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $asset->email }}" placeholder="n/a" readonly disabled>
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
									{{-- Asset Name --}}
									<div class="form-group">
										<label>
											Name
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="name" value="{{ $asset->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Type --}}
									<div class="form-group">
										<label>
											Asset Type
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ $asset->assetType->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Status --}}
									<div class="form-group">
										<label>
											Asset Status
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ $asset->status->name }}" placeholder="n/a" readonly disabled>
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
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $asset->street_1 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Asset STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $asset->street_2 }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $asset->city }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset STATE --}}
									<div class="form-group">
								    <label>
							        State
							        <span class="required">*</span>
								    </label>
								    <input class="d-none form-control" name="state" value="{{ $asset->state }}">
								    <select class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $asset->state }}" readonly disabled>
								        <option value="" selected>{{ $asset->state }}</option>
								    </select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Asset ZIP --}}
									<div class="form-group">
										<label>
											ZIP
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ $asset->zip }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-info-circle"></i>
										Information
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Asset Company Name --}}
									<div class="form-group">
										<label>
											Company
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="Compant Name" value="{{ $asset->company->name }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Rent --}}
									<div class="form-group">
										<label>
											Asset Rent
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="rent" value="${{ $asset->rent }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Asset Deposit --}}
									<div class="form-group">
										<label>
											Asset Deposit
											<span class="required">*</span>
										</label>
										<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="deposit" value="${{ $asset->deposit }}" placeholder="n/a" readonly disabled>
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-comment"></i>
										Notes
										<a href="#0" class="badge badge-secondary float-right add-note-link" data-toggle="modal" data-target="#add-note-modal">
											<i class="fas fa-plus-square"></i> Add Note
										</a>
									</h4>
								</div> <!-- col -->
								<div class="col-12 col">
									<ul class="reset notes-list">
										@if ($notes == '')
											<li class="notes-list-item">
												<div class="note-item text-center">
													No notes. Click the 'Add Note' to change that!
												</div>
											</li>
										@else
											@foreach($notes as $note)
												<li class="notes-list-item">
													<div class="media note-item">
													  <img src="http://placehold.it/50x50" class="mr-3 user-image" />
													  <div class="media-body">
													    <h5 class="mt-0 author">{{ $note->user->name }}</h5>
															<span class="timeago float-right">
																{{ $note->created_at->diffForHumans() }}
															</span>
															<span class="text">
																{{ $note->note }}
															</span>
													  </div>
													  <a href="#0" class="badge badge-secondary float-right edit-note-link ml-2" data-toggle="modal" data-target="#edit-note-modal">
															<i class="fas fa-pencil-alt"></i>
														</a>
														<a href="#0" class="badge badge-secondary float-right delete-note-link ml-2" data-toggle="modal" data-target="#delete-note-modal">
															<i class="fas fa-trash-alt"></i>
														</a>
													</div>
												</li>
												{{-- Must include the Note-Edit-Modal in the notes foreach loop, or page will error --}}
												@include('layouts/modals/note-edit')
											@endforeach
										@endif
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
















<hr />
	Assets - show.blade.php || <a href="assets/create">Create asset</a>
	<hr>
	<h4>Asset Profile</h4>
	<ul>
		<li>id: {{ $asset->id }}</li>
		<li>name: {{ $asset->name }}</li>
		<li>street_1: {{ $asset->street_1 }}</li>
		<li>street_2: {{ $asset->street_2 }}</li>
		<li>city: {{ $asset->city }}</li>
		<li>state: {{ $asset->state }}</li>
		<li>zip: {{ $asset->zip }}</li>
		<li>phone_1: {{ $asset->phone_1 }}</li>
		<li>phone_2: {{ $asset->phone_2 }}</li>
		<li>fax: {{ $asset->fax }}</li>
		<li>email: {{ $asset->email }}</li>
		<li>rent: {{ $asset->rent }}</li>
		<li>deposit: {{ $asset->deposit }}</li>
		<li>asset_type: {{ $asset->assetType->name }}</li>
		<li>company: {{ $asset->company->name }}</li>
		<li>status: {{ $asset->status->name }}</li>
		<li>created_at: {{ $asset->created_at }}</li>
		<li>updated_at: {{ $asset->updated_at }}</li>
		<li><a href="assets/{{ $asset->id }}/edit">Edit asset</a></li>
		<li><a href="/assets">View all assets</a></li>
	</ul>
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
			<li>id: {{ $note->id }}</li>
			<li>note: {{ $note->note }}</li>
			<li>user: {{ $note->user->name }}</li>
			<li>created_at: {{ $note->created_at }}</li>
			<li>updated_at: {{ $note->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Contracts (associated)</h4>
	@foreach($contracts as $contract)
		<ul>
			<li>id: {{ $contract->id }}</li>
			<li>tenant: {{ $contract->tenant->last_name }}, {{ $contract->tenant->first_name }}</li>
			<li>created_at: {{ $contract->created_at }}</li>
			<li>updated_at: {{ $contract->updated_at }}</li>
		</ul>
	@endforeach
@endsection
