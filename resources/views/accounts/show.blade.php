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
						<a href="/accounts/">
							Accounts Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Account Profile<span class="d-none d-sm-inline">: {{ $account->name }}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-file-alt"></i> Account Profile

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/accounts/" class="btn btn-round">Go Back</a>
					<a href="/accounts/{{ $account->id }}/edit" class="btn btn-primary">
						<i class="fas fa-edit"></i>
						Edit Account
					</a>
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
								{{ $account->name }}
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
									{{-- Account PHONE_1 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 1
											<span class="required">*</span>
										</label>
										<div class="input-group">
											<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" readonly disabled placeholder="n/a" value="{{ $account->phone_1 }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
									{{-- Account PHONE_2 --}}
									<div class="form-group">
										<label>
											<i class="fas fa-phone d-lg-none"></i>
											Phone 2
											<span class="optional">(optional)</span>
										</label>
										<div class="input-group">
											<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" readonly disabled placeholder="n/a" value="{{ $account->phone_2 }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-phone"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="fax-tab-content" role="tabpanel" aria-labelledby="fax-tab-button">
									{{-- Account FAX --}}
									<div class="form-group">
										<label>
											<i class="fas fa-fax d-lg-none"></i>
											Fax
										</label>
										<div class="input-group">
											<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" readonly disabled placeholder="n/a" value="{{ $account->fax }}">
											<div class="input-group-append d-none d-lg-block">
												<div class="input-group-text">
													<i class="fas fa-fax"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-button">
									{{-- Account EMAIL --}}
									<div class="form-group">
										<label>
											<i class="fas fa-at d-lg-none"></i>
											Email
										</label>
										<div class="input-group">
											<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" readonly disabled placeholder="n/a" value="{{ $account->email }}">
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
										<input type="text" class="form-control" name="created_at" value="{{ $account->created_at->format('m/d/y') }}" disabled readonly readonly disabled placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label>
											Updated On
										</label>
										<input type="text" class="form-control" name="updated_at" value="{{ $account->updated_at->format('m/d/y') }}" disabled readonly readonly disabled placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Account Type --}}
									<div class="form-group">
										<label for="account_type_id">
											Account Type
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control" name="type" value="{{ $account->accountType->name }}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									<div class="form-group">
										<label>
											Account Status
										</label>
										<input type="text" class="form-control" name="status" value="{{ $account->status->name}}" disabled readonly placeholder="n/a">
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-globe-americas"></i>
										Address
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Account STREET_1 --}}
									<div class="form-group">
										<label>
											Street Address
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" readonly disabled placeholder="n/a" value="{{ $account->street_1 }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-6 col">
									{{-- Account STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" readonly disabled placeholder="n/a" value="{{ $account->street_2 }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Account CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" readonly disabled placeholder="n/a" value="{{ $account->city }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Account STATE --}}
									<div class="form-group">
										<label>
											State
											<span class="required">*</span>
										</label>
										<select class="form-control" name="state" value="{{ $account->state }}" readonly disabled>
											<option value="" selected>{{ $account->state }}</option>
										</select>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col">
									{{-- Account ZIP --}}
									<div class="form-group">
										<label>
											ZIP
											<span class="required">*</span>
										</label>
										<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" readonly disabled placeholder="n/a" value="{{ $account->zip }}">
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-user"></i>
										Contact
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Contact Last Name --}}
									<div class="form-group">
										<label>Contact Name:</label>
										<input class="form-control {{ $errors->has('contact_name') ? 'has-error' : '' }}" name="contact_name" readonly disabled placeholder="n/a" value="{{ $account->contact_name }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Contact Phone 1 --}}
									<div class="form-group">
										<label>Contact Phone 1:</label>
										<input class="form-control {{ $errors->has('contact_phone_1') ? 'has-error' : '' }}" name="contact_phone_1" readonly disabled placeholder="n/a" value="{{ $account->contact_phone_1 }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Contact Phone 2 --}}
									<div class="form-group">
										<label>Contact Phone 2:</label>
										<input class="form-control {{ $errors->has('contact_phone_2') ? 'has-error' : '' }}" name="contact_phone_2" readonly disabled placeholder="n/a" value="{{ $account->contact_phone_2 }}" >
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Contact Email --}}
									<div class="form-group">
										<label>Contact Email:</label>
										<input class="form-control {{ $errors->has('contact_email') ? 'has-error' : '' }}" name="contact_email" readonly disabled placeholder="n/a" value="{{ $account->contact_email }}" >
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-info-circle"></i>
										Information
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col">
									{{-- Account Number --}}
									<div class="form-group">
										<label>Account Number</label>
										<div class="input-group">
											<input type="text" class="form-control {{ $errors->has('acct_num') ? 'has-error' : '' }}" name="acct_num" readonly disabled placeholder="n/a" value="{{ $account->acct_num }}">
										</div> <!-- input group -->
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-5 col">
									{{-- Account URL --}}
									<div class="form-group">
										<label>Account URL</label>
										<input type="text" class="form-control {{ $errors->has('url') ? 'has-error' : '' }}" name="url" readonly disabled placeholder="n/a" value="{{ $account->url }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-2 col">
									{{-- Account Company --}}
									<div class="form-group">
										<label>Company</label>
										<input type="text" class="form-control {{ $errors->has('company_id') ? 'has-error' : '' }}" name="company_id" readonly disabled placeholder="n/a" value="{{ $account->company->name }}">
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-2 col">
									{{-- Account Asset --}}
									<div class="form-group">
										<label>Asset</label>
										<input type="text" class="form-control {{ $errors->has('asset_id') ? 'has-error' : '' }}" name="asset_id" readonly disabled placeholder="n/a" value="{{ $account->asset->name }}">
									</div>
								</div> <!-- col -->

                <div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-copy"></i>
										Documents
									</h4>
								</div> <!-- col -->
								<div class="col-12 col">
									<div class="documents-container">
                    <div class="document-item">
                      <a href="#0" class="d-block link">
                        <h4 class="title">Word Document</h4>
                        <i class="fas fa-file-word icon"></i>
                      </a>
                      <div class="button-group">
                        <a href="#0" class="btn btn-primary btn-sm">
													<i class="fas fa-eye"></i>
												</a>
                        <a href="#0" class="btn btn-secondary btn-sm">
													<i class="fas fa-download"></i>
                        </a>
												<a href="#0" class="btn btn-danger btn-sm">
													<i class="fas fa-trash-alt"></i>
												</a>
                      </div> <!-- button group -->
                    </div> <!-- document item -->
                    <div class="document-item">
                      <a href="#0" class="d-block link">
                        <h4 class="title">Word Document</h4>
                        <i class="fas fa-file-word icon"></i>
                      </a>
                      <div class="button-group">
                        <a href="#0" class="btn btn-primary btn-sm">
													<i class="fas fa-eye"></i>
												</a>
                        <a href="#0" class="btn btn-secondary btn-sm">
													<i class="fas fa-download"></i>
                        </a>
												<a href="#0" class="btn btn-danger btn-sm">
													<i class="fas fa-trash-alt"></i>
												</a>
                      </div> <!-- button group -->
                    </div> <!-- document item -->
                    <div class="document-item">
                      <a href="#0" class="d-block link">
                        <h4 class="title">Word Document</h4>
                        <i class="fas fa-file-word icon"></i>
                      </a>
                      <div class="button-group">
                        <a href="#0" class="btn btn-primary btn-sm">
													<i class="fas fa-eye"></i>
												</a>
                        <a href="#0" class="btn btn-secondary btn-sm">
													<i class="fas fa-download"></i>
                        </a>
												<a href="#0" class="btn btn-danger btn-sm">
													<i class="fas fa-trash-alt"></i>
												</a>
                      </div> <!-- button group -->
                    </div> <!-- document item -->
                    <div class="document-item">
                      <a href="#0" class="d-block link">
                        <h4 class="title">Word Document</h4>
                        <i class="fas fa-file-word icon"></i>
                      </a>
                      <div class="button-group">
                        <a href="#0" class="btn btn-primary btn-sm">
													<i class="fas fa-eye"></i>
												</a>
                        <a href="#0" class="btn btn-secondary btn-sm">
													<i class="fas fa-download"></i>
                        </a>
												<a href="#0" class="btn btn-danger btn-sm">
													<i class="fas fa-trash-alt"></i>
												</a>
                      </div> <!-- button group -->
                    </div> <!-- document item -->
                  </div> <!-- documents container -->
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
@include('layouts/modals/view-images')
<!-- ADD NOTES MODEL -->
@include('layouts/modals/note-add')


@endsection
