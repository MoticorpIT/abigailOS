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
										@foreach($images as $image)
											<div class="carousel-item active"> {{-- active --}}
												<img src="{{ $image->getUrl('main') }}" class="d-block w-100" alt="{{ $asset->name }} Gallery Image">
											</div>
										@endforeach
									</div> {{-- inner --}}
									{{-- SCROLL BUTTONS --}}
									<a class="carousel-control-prev" href="#images-carousel" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#images-carousel" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div> {{-- col --}}

								{{-- SMALL IMAGE THUMBAILS --}}
								<div class="col-12 col-md-4">
									<ol class="image-thumbnails carousel-indicators">

										@foreach($images as $image)
											<li class="thumbnail-item "> {{-- active --}}
												<div class="row no-gutters">
													<div class="col-12 img-group">
														<div class="carousel-indicator" data-target="#images-carousel" data-slide-to="0" class="active">
															<img src="{{ $image->getUrl('thumb') }}" class="d-block w-100" alt="{{ $asset->name }} Gallery Image Thumb">
														</div>
													</div> {{-- col --}}
													<div class="col-12 btn-group">
														<form id="star-image-form" method="POST" action="images/{{ $image->id }}">
															<a href="#0" class="btn btn-secondary disabled btn-sm">
																<i class="fas fa-star"></i>
															</a>
														</form>
														<form id="download-image-form" method="POST" action="images/{{ $image->id }}">
															<a href="#0" class="btn btn-primary btn-sm">
																<i class="fas fa-download"></i>
															</a>
														</form>
														<form id="delete-image-form" method="POST" action="/images/{{ $image->id }}">
															@csrf
															@method('DELETE')
															<input type="hidden" id="id" name="id" value="{{ $image->id }}">
															<input type="hidden" id="asset_id" name="asset_id" value="{{ $asset->id }}">
															<button name="submit" class="btn btn-danger btn-sm">
																<i class="fas fa-trash-alt"></i>
															</button>
														</form>
													</div> {{-- col --}}
												</div> {{-- row --}}
											</li> {{-- thumbnail item --}}
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
				<button type="button" class="download-all-link btn btn-secondary mr-auto">
					<i class="fas fa-download"></i>
					Download All Images
				</button>

				{{-- DONE / CLOSE / CANCEL BUTTON --}}
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>

				{{-- IMAGE UPLOAD FORM  --}}
				<form id="asset-img-form" class="d-none" method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
					@csrf
					<input type="text" id="asset_id" name="asset_id" class="{{ $errors->has('asset_id') ? 'has-error' : '' }}" value="{{ $asset->id }}">
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
</div> {{-- update images --}}
