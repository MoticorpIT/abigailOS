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
							<h2 class="heading d-block d-sm-none">{{ $account->name }}</h2>
              <h2 class="heading d-none d-sm-block">
                <i class="fas fa-file-alt"></i>
                Account Profile
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
                      <div class="input">{{ $account->phone_1 }}</div>
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
                      <div class="input">{{ $account->phone_2 }}</div>
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
                      <div class="input">{{ $account->fax }}</div>
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
                      <div class="input">{{ $account->email }}</div>
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
										<li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
                          Account Name
												</span>
											</a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
										</li>
                    <li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
                          Account Name
												</span>
											</a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
										</li>
                    <li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
                          Account Name
												</span>
											</a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
										</li>
                    <li class="assoc-list-item">
											<a href="#0" class="assoc-list-link">
												<span class="name">
                          Account Name
												</span>
											</a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
										</li>
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-ass-tab-content" role="tabpanel" aria-labelledby="assoc-ass-tab-button">
									<ul class="reset assoc-list acc">
                    <li class="assoc-list-item">
                      <a href="#0" class="assoc-list-link">
                        Contract Name
                      </a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
                    </li>
                    <li class="assoc-list-item">
                      <a href="#0" class="assoc-list-link">
                        Contract Name
                      </a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
                    </li>
                    <li class="assoc-list-item">
                      <a href="#0" class="assoc-list-link">
                        Contract Name
                      </a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
                    </li>
                    <li class="assoc-list-item">
                      <a href="#0" class="assoc-list-link">
                        Contract Name
                      </a>
                      <div class="assoc-link-dropdown dropdown">
                        <a class="assoc-link-arrow dropdown-toggle" href="#" id="assoc-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-circle" data-template="<i class=&quot;fas fa-chevron-circle-down&quot;></i>"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assoc-link-dd1">
                          <div class="btn-group" role="group">
                            <a href="#0" class="btn btn-sm btn-primary view">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-secondary download">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#0" class="btn btn-sm btn-danger delete">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div> <!-- btn group -->
                        </div>
                      </div> <!-- task link dropdown -->
                    </li>
									</ul>
								</div>
								<div class="tab-pane fade" id="assoc-hide-tab-content" role="tabpanel" aria-labelledby="assoc-hide-tab-button">
								</div>
							</div>
						</div> <!-- col -->
						<div class="col-12 col-sm-7 col-md-8 col-lg-9 profile-detail-col">
							<div class="row">
                <div class="col-12 col">
                  <div class="form-group">
                    <label for="name">
											Name
										</label>
                    <div class="input">{{ $account->name }}</div>
                  </div>
                </div> <!-- col -->
								<div class="col-12 col-md-3 col col-created">
									<div class="form-group">
										<label>
											Created On
										</label>
                    <div class="input">{{ $account->created_at->format('m/d/y') }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-updated">
									<div class="form-group">
										<label>
											Updated On
										</label>
                    <div class="input">{{ $account->updated_at->format('m/d/y') }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-type col-account-type">
									{{-- Account Type --}}
									<div class="form-group">
										<label for="account_type_id">
											Account Type
											<span class="required">*</span>
										</label>
                    <div class="input">{{ $account->accountType->name }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-status">
									<div class="form-group">
										<label>
											Account Status
										</label>
                    <div class="input">{{ $account->status->name}}</div>
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-globe-americas"></i>
										Address
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-8 col col-street1">
									{{-- Account STREET_1 --}}
									<div class="form-group">
										<label>
											Street Address
											<span class="required">*</span>
										</label>
                    <div class="input">{{ $account->street_1 }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col col-street2">
									{{-- Account STREET_2 --}}
									<div class="form-group">
										<label>
											Street Address 2
											<span class="optional">(optional)</span>
										</label>
                    <div class="input">{{ $account->street_2 }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col col-city">
									{{-- Account CITY --}}
									<div class="form-group">
										<label>
											City
											<span class="required">*</span>
										</label>
                    <div class="input">{{ $account->city }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col col-state">
									{{-- Account STATE --}}
									<div class="form-group">
										<label>
											State
											<span class="required">*</span>
										</label>
                    <div class="input">{{ $account->state }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-4 col col-zip">
									{{-- Account ZIP --}}
									<div class="form-group">
										<label>
											ZIP
											<span class="required">*</span>
										</label>
                    <div class="input">{{ $account->zip }}</div>
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-user"></i>
										Contact
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-name">
									{{-- Contact Last Name --}}
									<div class="form-group">
										<label>Contact Name:</label>
                    <div class="input">{{ $account->contact_name }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-phone col-phone1">
									{{-- Contact Phone 1 --}}
									<div class="form-group">
										<label>Contact Phone 1:</label>
                    <div class="input">{{ $account->contact_phone_1 }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-phone col-phone2">
									{{-- Contact Phone 2 --}}
									<div class="form-group">
										<label>Contact Phone 2:</label>
                    <div class="input">{{ $account->contact_phone_2 }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-email">
									{{-- Contact Email --}}
									<div class="form-group">
										<label>Contact Email:</label>
                    <div class="input">{{ $account->contact_email }}</div>
									</div>
								</div> <!-- col -->

								<div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-info-circle"></i>
										Information
									</h4>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-account-num">
									{{-- Account Number --}}
									<div class="form-group">
										<label>Account Number</label>
                    <div class="input">{{ $account->acct_num }}</div>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-2 col col-account-url">
									{{-- Account URL --}}
									<div class="form-group">
										<label>Account URL</label>
                    <a class="btn btn-secondary visit-link" href="{{ $account->url }}" target="_blank">Visit <i class="fas fa-external-link-square-alt icon"></i></a>
									</div>
								</div> <!-- col -->
								<div class="col-12 col-md-3 col col-name">
									{{-- Account Asset --}}
									<div class="form-group">
										<label>Asset</label>
                    <div class="input">{{ $account->asset->name }}</div>
									</div>
								</div> <!-- col -->
                <div class="col-12 col-md-2 col col-name">
									{{-- Account Company --}}
									<div class="form-group">
										<label>Company</label>
                    <div class="input">{{ $account->company->name }}</div>
									</div>
								</div> <!-- col -->

                <div class="col-12 col">
									<h4 class="heading divider">
										<i class="fas fa-copy"></i>
										Documents
                    <a href="#0" class="badge badge-primary float-right add-doc-link" >
                			<i class="fas fa-plus-square"></i> Add Doc<span>ument</span>
                		</a>
									</h4>
								</div> <!-- col -->
								<div class="col-12 col">
									<div class="documents-container">
                    <div class="document-item">
                      <a href="#0" class="link">
                        <h4 class="title">Word Document</h4>
                        <i class="fas fa-file-word icon"></i>
                      </a>
                      <div class="btn-group">
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
                      <a href="#0" class="link">
                        <h4 class="title">Invoice Document</h4>
                        <i class="fas fa-file-invoice icon"></i>
                      </a>
                      <div class="btn-group">
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
                      <a href="#0" class="link">
                        <h4 class="title">PDF Document</h4>
                        <i class="fas fa-file-pdf icon"></i>
                      </a>
                      <div class="btn-group">
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
                      <a href="#0" class="link">
                        <h4 class="title">Contract Document</h4>
                        <i class="fas fa-file-contract icon"></i>
                      </a>
                      <div class="btn-group">
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
{{-- @include('layouts/modals/images-view') --}}
<!-- ADD NOTES MODEL -->
@include('layouts/modals/note-add')


@endsection
