{{-- Update Images Modal --}}
<div class="modal fade images-modal" id="update-images" tabindex="-1" role="dialog" aria-labelledby="modal-heading" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			{{-- MODAL HEADER --}}
			<div class="modal-header">
				<h5 class="modal-title" id="modal-heading">
					<i class="fas fa-images"></i>
					Update Images
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			{{-- MODAL BODY --}}
			<div class="modal-body">
				<div class="updating-images-wrapper">
					<div id="images-carousel" class="images-carousel carousel slide" data-interval="false">
						<div class="row no-gutters">

							@if (!count($images))
								<div class="text-center" style="width:100%; color:gray;">
									<i class="fas fa-exclamation-circle fa-2x"></i>
									<h4>Oh Snaps!</h4>
									<p>This asset doesn't appear to have images.
									<br>
									Click the 'Add Image' button to begin adding images now.</p>
								</div>
							@else
								{{-- LARGE IMAGE CAROUSEL --}}
								<div class="col-12 col-md-8">
									{{-- IMAGES --}}
									<div class="carousel-inner">
										@php $i = 0; @endphp
										@foreach($images as $image)
											<div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
												<img src="{{ $image->getUrl('main') }}" class="d-block w-100" alt="{{ $asset->name }} Gallery Image">
											</div>
											@php $i++ @endphp
										@endforeach
									</div>
									{{-- SCROLL BUTTONS --}}
									<a class="carousel-control-prev" href="#images-carousel" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#images-carousel" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>

								{{-- IMAGE THUMBNAILS --}}
								<div class="col-12 col-md-4">
									<ol class="image-thumbnails carousel-indicators">
										
										@php $i = 0; @endphp
										@foreach($images as $image)
											<li class="thumbnail-item {{ $i == 0 ? 'active' : '' }}">
												<div class="row no-gutters">

													{{-- THUMBNAILS --}}
													<div class="col-12 img-group">
														<div class="carousel-indicator" data-target="#images-carousel" data-slide-to="{{ $i }}" class="active">
															<img src="{{ $image->getUrl('thumb') }}" class="d-block w-100" alt="{{ $asset->name }} Gallery Image Thumb">
														</div>
													</div>

													{{-- THUMBNAIL BUTTONS --}}
													<div class="col-12 btn-group">
														{{-- MAKE PROFILE IMAGE --}}
														<form id="profile-image-form" method="POST" action="{{ route('images.update', $image->id) }}">
															@csrf
															@method('PATCH')
															<input type="hidden" id="asset_id" name="asset_id" value="{{ $asset->id }}">
															<button name="submit" class="btn btn-secondary btn-sm {{ $image->id === $asset->profile_img_id ? 'disabled btn-success' : ''}}">
																<i class="fas fa-star"></i>
															</button>
														</form>
														{{-- DOWNLOAD IMAGE --}}
														<form id="download-image-form" method="GET" action="{{ route('images.downloadOne', $image->id) }}">
															@csrf
															<button name="submit" class="btn btn-primary btn-sm">
																<i class="fas fa-download"></i>
															</button>
														</form>
														{{-- DELETE IMAGE --}}
														<form id="delete-image-form" method="POST" action="{{ route('images.destroy', $image->id) }}">
															@csrf
															@method('DELETE')
															<input type="hidden" id="asset_id" name="asset_id" value="{{ $asset->id }}">
															<button name="submit" class="btn btn-danger btn-sm" {{ $image->id === $asset->profile_img_id ? 'disabled' : ''}}>
																<i class="fas fa-trash-alt"></i>
															</button>
														</form>
													</div> 

												</div> 
											</li>
											@php $i++ @endphp
										@endforeach

									</ol> {{-- carousel indicators --}}
								</div> {{-- col --}}
							@endif

						</div> {{-- row --}}
					</div> {{-- carousel --}}
				</div> {{-- updating images wrapper --}}
			</div>

			{{-- MODAL FOOTER --}}
			<div class="modal-footer">

				{{-- DOWNLOAD ALL IMAGES --}}
				<form id="download-all-images-form" method="GET" action="{{ route('images.downloadAll', $asset->id) }}" enctype="multipart/form-data">
					@csrf
					<button type="submit" name="submit" class="download-all-link btn btn-secondary mr-auto">
						<i class="fas fa-download"></i>
						Download All Images
					</button>
				</form>

				{{-- CLOSE / CANCEL BUTTON --}}
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
				
				{{-- IMAGE UPLOAD FORM - HIDDEN --}}
				<form id="asset-img-form" class="" method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" id="asset_id" name="asset_id" class="{{ $errors->has('asset_id') ? 'has-error' : '' }}" value="{{ $asset->id }}">
					<input type="file" id="uploadFileField" name="image" class="{{ $errors->has('image') ? 'has-error' : '' }}">
					<input type="submit" id="add-image-btn" name="submit">
				</form>

				{{-- ADD IMAGE BUTTON --}}
				<button type="button" class="btn btn-primary uploadFileButton">
					<i class="fas fa-plus-square"></i>
					Add Image
				</button>

			</div>
		</div>
	</div>
</div>
