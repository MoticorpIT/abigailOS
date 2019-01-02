<div class="modal fade" id="edit-note-modal" tabindex="-1" role="dialog" aria-labelledby="edit-note-link" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reschedule-task-modal-heading">
					<i class="fas fa-comment"></i>
					Edit a Note
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="/notes/{{ $note->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="modal-body">
					<div class="media note-item">
						{{-- Avatar Field -|- Will need to add avatar field to users table --}}
						<img src="http://placehold.it/50x50" class="mr-3 user-image" />

						<div class="media-body">
							{{-- HIDEEN FIELDS --}}
								{{-- Hidden User Field - Pulls user_id from DB --}}
								<input type="hidden" name="user_id" value="{{ $note->user_id }}">

								{{-- Hidden Note Id Field - Used for ajax edit --}}
								<input type="hidden" name="id" value="{{ $note->id }}">

								{{-- Hidden Status Id Field --}}
								<input type="hidden" name="status_id" value="1">

								{{-- Hidden Edited_By User Field - Will need to add edited_by_user_id field to notes table --}}
								<input type="hidden" name="edited_by_user_id" value="{{ Auth::user()->id }}">
								
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

							{{-- Original Author of the Note --}}
							<h5 class="mt-0 author">{{ $note->user->name }}</h5>

							{{-- Note field --}}
							<span class="text">
								<textarea class="form-control" id="note-edit" rows="2" autofocus>{{ $note->note }}</textarea>
							</span>
						</div>
					</div>
				</div>
				{{-- Form Buttons --}}
				<div class="modal-footer">
					<a href="" data-dismiss="modal" class="cancel-link">Cancel</a>
					<button id="submit-btn" type="button" class="edit-note-ajax btn btn-primary">Edit Note</button>
				</div>
			</form>
		</div>
	</div>
</div> 
