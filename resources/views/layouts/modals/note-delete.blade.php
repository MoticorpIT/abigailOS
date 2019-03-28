<div class="modal fade" id="delete-note-modal-{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-note-link" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background: red">
				<div class="icon-box">
					{{-- <i class="far fa-times-circle"></i> --}}
				</div>				
				<h4 class="modal-title">Confirm Note Delete</h4>	
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<p>
					Do you really want to delete this note?
					<br><br>
					This process cannot be undone.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

				<form id="delete-note-form-{{ $note->id }}" method="POST" action="/notes/{{ $note->id }}">
					@csrf
					@method('PATCH')
					{{-- HIDEEN FIELDS --}}
						{{-- Hidden User Field - Pulls user_id from DB --}}
						<input type="hidden" id="del-user_id-{{ $note->id }}" name="user_id" value="{{ $note->user_id }}">
						{{-- Hidden Status Id Field --}}
						<input type="hidden" id="del-status_id-{{ $note->id }}" name="status_id" value="2">
						{{-- Hidden Edited_By User Field - Will need to add edited_by_user_id field to notes table --}}
						<input type="hidden" id="del-edited_by_user_id-{{ $note->id }}" name="edited_by_user_id" value="{{ $note->edited_by_user_id }}">
						{{-- Hidden Note Field --}}
						<input type="hidden" id="del-note-{{ $note->id }}" name="note" value="{{ $note->note }}">
						{{-- Hidden Id fields - Wrapped in conditials - This allows the modal to be used globally --}}
						@if (Request::segment(1) == 'accounts')
							<input type="hidden" id="del-account_id-{{ $note->id }}" name="account_id" value="{{ $account->id }}">
						@endif
						@if (Request::segment(1) == 'assets')
							<input type="hidden" id="del-asset_id-{{ $note->id }}" name="asset_id" value="{{ $asset->id }}">
						@endif
						@if (Request::segment(1) == 'companies')
							<input type="hidden" id="del-company_id-{{ $note->id }}" name="company_id" value="{{ $company->id }}">
						@endif
						@if (Request::segment(1) == 'tenants')
							<input type="hidden" id="del-tenant_id-{{ $note->id }}" name="tenant_id" value="{{ $tenant->id }}">
						@endif
					{{-- HIDDEN FIELDS END --}}
					<button type="button" class="notes-button btn btn-danger delete-note-ajax delete-note-link" value="{{ $note->id }}">
						<i class="fas fa-trash-alt"></i> Delete Note
					</button>
				</form>
				
			</div>
		</div>
	</div>
</div>

