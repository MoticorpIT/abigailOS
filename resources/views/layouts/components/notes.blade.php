{{-- NOTES SECTION HEADER --}}
<div class="col-12 col">
	<h4 class="heading divider">
		<i class="fas fa-comment"></i>
		Notes
		<a href="#0" class="badge badge-primary float-right add-note-link" data-toggle="modal" data-target="#add-note-modal">
			<i class="fas fa-plus-square"></i> Add Note
		</a>
	</h4>
</div> <!-- col -->

{{-- COMPANY NOTES --}}
<div class="col-12 col">
	<ul class="reset notes-list">
		@if ($notes->count() == 0)
			<li class="notes-list-item">
				<div class="note-item text-center">
					No notes. Click 'Add Note' to change that!
				</div>
			</li>
		@else
			@foreach($notes as $note)
				<li class="notes-list-item">
					<div class="media note-item">
						<div class="media-side">
							{{-- USER IMAGE --}}
							<img src="http://placehold.it/50x50" class="mr-3 user-image" />
						</div> <!-- media side -->
						{{-- NOTE HEADER --}}
						<div class="media-body">
							<h5 class="mt-0 author text-capitalize">{{ $note->user->name }}</h5>

							<div class="notes-button-set float-sm-right">
								{{-- EDIT NOTE BUTTON --}}
								<button type="button" class="btn btn-secondary btn-sm edit-note-link notes-button" data-toggle="modal" data-target="#edit-note-modal-{{ $note->id }}">
									<i class="fas fa-edit"></i>
								</button>
								{{-- 'DELETE' NOTE BUTTON - FORM USES AJAX TO UPDATE NOTES STATUS_ID --}}
								<form id="delete-note-form-{{ $note->id }}" method="POST" action="/notes/{{ $note->id }}">
									{{ csrf_field() }}
									{{ method_field('PATCH') }}
									{{-- HIDEEN FIELDS --}}
										{{-- Hidden User Field - Pulls user_id from DB --}}
										<input type="hidden" name="user_id" value="{{ $note->user_id }}">
										{{-- Hidden Status Id Field --}}
										<input type="hidden" name="status_id" value="2">
										{{-- Hidden Edited_By User Field - Will need to add edited_by_user_id field to notes table --}}
										<input type="hidden" name="edited_by_user_id" value="{{ $note->edited_by_user_id }}">
										{{-- Hidden Note Field --}}
										<input type="hidden" id="note-delete-{{ $note->id }}" name="note" value="{{ $note->note }}">
										{{-- Hidden Id fields - Wrapped in conditials - This allows the modal to be used globally --}}
										@if (Request::segment(1) == 'accounts')
											<input type="hidden" name="account_id" value="{{ $account->id }}">
										@endif
										@if (Request::segment(1) == 'assets')
											<input type="hidden" name="asset_id" value="{{ $asset->id }}">
										@endif
										@if (Request::segment(1) == 'companies')
											<input type="hidden" name="company_id" value="{{ $company->id }}">
										@endif
										@if (Request::segment(1) == 'tenants')
											<input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
										@endif
									{{-- HIDDEN FIELDS END --}}

									<button type="button" class="notes-button btn btn-danger btn-sm delete-note-ajax delete-note-link" value="{{ $note->id }}">
										<i class="fas fa-trash-alt"></i>
									</button>
								</form>
							</div> <!-- notes button set -->

							<span class="timeago float-right">{{ $note->created_at->diffForHumans() }}</span>

							<span class="text">{{ $note->note }}</span>
						</div>


					</div>

				</li>

				{{-- Must include the Note-Edit-Modal in the notes foreach loop, or page will error --}}
				@include('layouts/modals/note-edit')
			@endforeach
		@endif
	</ul> <!-- notes list -->
</div> <!-- col -->
