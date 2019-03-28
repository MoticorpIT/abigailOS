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
							@if ($note->user->avatar_id == null)
								<img src="/media/images/user-default-avatar-thumb.png" class="mr-3 user-image" alt="Default User Avatar" />
							@else
								<img src="{{ $note->user->avatar->getURL('thumb') ?? '' }}" class="mr-3 user-image" alt="{{ $user->name }}s-avatar" />
							@endif
						</div> <!-- media side -->
						{{-- NOTE HEADER --}}
						<div class="media-body">
							<h5 class="mt-0 author text-capitalize">{{ $note->user->name }}</h5>

							<div class="notes-button-set float-sm-right">
								{{-- EDIT NOTE BUTTON (modal trigger) --}}
								<button type="button" class="btn btn-secondary btn-sm edit-note-link notes-button" data-toggle="modal" data-target="#edit-note-modal-{{ $note->id }}">
									<i class="fas fa-edit"></i>
								</button>
								{{-- DELETE NOTE BUTTON (modal trigger) --}}
								<button type="button" class="notes-button btn btn-danger btn-sm delete-note-link" data-toggle="modal" data-target="#delete-note-modal-{{ $note->id }}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</div> <!-- notes button set -->

							<span class="timeago float-right">{{ $note->created_at->diffForHumans() }}</span>

							<span class="text">{{ $note->note }}</span>
						</div>

					</div>

				</li>

				{{-- Must include the Note-Edit-Modal + Note-Delete-Modal in the notes foreach loop, or page will error --}}
				@include('layouts/modals/note-edit')
				@include('layouts/modals/note-delete')
			@endforeach
		@endif
	</ul> <!-- notes list -->
</div> <!-- col -->
