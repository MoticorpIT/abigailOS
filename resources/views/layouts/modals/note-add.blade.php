<div class="modal fade" id="add-note-modal" tabindex="-1" role="dialog" aria-labelledby="add-note-link" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reschedule-task-modal-heading">
					<i class="fas fa-comment"></i>
					Add a Note
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="/notes">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="media note-item">
						@if (auth()->user()->avatar == null)
							<img src="/media/images/user-default-avatar-thumb.png" class="mr-3 user-image" alt="Default User Avatar" />
						@else
							<img src="{{ auth()->user()->avatarUrl }}" class="mr-3 user-image" alt="{{ Auth::user()->name }}s-avatar" />
						@endif

						<div class="media-body">
							{{-- Hidden User Field - Pulls Current Authenticated User (account logged in) --}}
							<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
							<input type="hidden" id="status_id" name="status_id" value="1">

							{{-- Hidden Id fields - Wrapped in conditials - This allows the modal to be used globally --}}
							@if (Request::segment(1) == 'accounts')
								<input type="hidden" id="account_id" name="account_id" value="{{ $account->id }}">
							@endif
							@if (Request::segment(1) == 'assets')
								<input type="hidden" id="asset_id" name="asset_id" value="{{ $asset->id }}">
							@endif
							@if (Request::segment(1) == 'companies')
								<input type="hidden" id="company_id" name="company_id" value="{{ $company->id }}">
							@endif
							@if (Request::segment(1) == 'tenants')
								<input type="hidden" id="tenant_id" name="tenant_id" value="{{ $tenant->id }}">
							@endif

							{{-- Note field --}}
							<span class="text">
								<textarea class="form-control add-note-field" id="note-add" rows="4" placeholder="Enter your note..." autofocus></textarea>
							</span>
						</div>
					</div>
				</div>
				{{-- Form Buttons --}}
				<div class="modal-footer">
					<a href="" data-dismiss="modal" class="cancel-link">Cancel</a>
					<button id="submit-btn" type="button" class="add-note-ajax btn btn-primary">
						<i class="far fa-check-circle"></i>
						Add Note
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
