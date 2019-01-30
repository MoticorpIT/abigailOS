<div class="modal fade" id="add-task-modal" tabindex="-1" role="dialog" aria-labelledby="add-task-link" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reschedule-task-modal-heading">
					<i class="fas fa-comment"></i>
					Add a Sub-Task
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="/tasks">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="media task-item">
						<div class="media-body">
							{{-- Hidden User Field - Pulls Current Authenticated User (account logged in) --}}
							
							<input type="hidden" name="task_id" value="{{ $task->id }}">
							<input type="hidden" name="account_id" value="{{ $task->account_id }}">
							<input type="hidden" name="company_id" value="{{ $task->company_id }}">
							<input type="hidden" name="asset_id" value="{{ $task->asset_id }}">
							
							<div class="form-group">
								<label>Subtask</label>
								<div class="input-group">
									<input style="width:100%" type="text" name="task" value="{{ old('task') }}" focus>
								</div>
							</div>
							<div class="form-group">
								<label>Parent Task</label>
								<div class="input-group">
									<input style="width:100%" type="text" value="{{ $task->task }}" disabled read-only>
								</div>
							</div>
							<div class="form-group">
								<label>
									Task Type
								</label>
								<select class="form-control" name="task_type_id" value="{{ old('task_type_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($task_types as $key => $value)
										<option value="{{$key}}">{{ $value }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Due Date</label>
								<div class="input-group">
									<input style="width:100%" type="text" name="due_date" value="">
								</div>
							</div>
							<div class="form-group">
								<label>
									Prioritiy
								</label>
								<select class="form-control" name="priority_id" value="{{ old('priority_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($priorities as $key => $value)
										<option value="{{$key}}">{{ $value }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Repeats</label>
								<select class="form-control" name="repeats">
									<option value="0" selected>No</option>
									<option value="1">Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label>
									Assigned User
								</label>
								<select class="form-control" name="assigned_user_id" value="{{ old('assigned_user_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($users as $user)
									<option value="{{$user->id}}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				{{-- Form Buttons --}}
				<div class="modal-footer">
					<a href="" data-dismiss="modal" class="cancel-link">Cancel</a>
					<button id="submit-btn" type="button" class="add-task-ajax btn btn-primary">
						<i class="far fa-check-circle"></i>
						Add Note
					</button>
				</div>
			</form>
		</div>
	</div>
</div>