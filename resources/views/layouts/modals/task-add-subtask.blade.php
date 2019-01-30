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

							{{-- Hidden Fields - All Data Pulled from Parent Task --}}
							<input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
							<input type="hidden" name="account_id" id="account_id" value="{{ $task->account_id }}">
							<input type="hidden" name="company_id" id="company_id" value="{{ $task->company_id }}">
							<input type="hidden" name="asset_id" id="asset_id" value="{{ $task->asset_id }}">
							
							{{-- SUBTASK FIELD --}}
							<div class="form-group">
								<label>Subtask</label>
								<div class="input-group">
									<input style="width:100%" type="text" name="task" id="task" value="{{ old('task') }}" focus>
								</div>
							</div>

							{{-- PARENT TASK
								- FOR VIEWING ONLY
								- Used only to show the parent task for the subtask being added
								- The Parent's task_id is passed above in a hidden input (#task_id)
								- No data is passed from this input
							--}}
							<div class="form-group">
								<label>Parent Task</label>
								<div class="input-group">
									<input style="width:100%" type="text" value="{{ $task->task }}" disabled read-only>
								</div>
							</div>

							{{-- TASK TYPE DROPDOWN --}}
							<div class="form-group">
								<label>
									Task Type
								</label>
								<select class="form-control" name="task_type_id" id="task_type_id" value="{{ old('task_type_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($task_types as $key => $value)
										<option value="{{$key}}">{{ $value }}</option>
									@endforeach
								</select>
							</div>

							{{-- DUE DATE FIELD --}}
							<div class="form-group">
								<label>Due Date</label>
								<div class="input-group">
									<input style="width:100%" type="text" name="due_date" id="due_date" value="">
								</div>
							</div>

							{{-- PRIORITY DROPDOWN --}}
							<div class="form-group">
								<label>
									Prioritiy
								</label>
								<select class="form-control" name="priority_id" id="priority_id" value="{{ old('priority_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($priorities as $key => $value)
										<option value="{{$key}}">{{ $value }}</option>
									@endforeach
								</select>
							</div>

							{{-- REPEATS DROPDOWN --}}
							<div class="form-group">
								<label>Repeats</label>
								<select class="form-control" name="repeats" id="repeats">
									<option value="0" selected>No</option>
									<option value="1">Yes</option>
								</select>
							</div>

							{{-- ASSIGNED USER DROPDOWN --}}
							<div class="form-group">
								<label>
									Assigned User
								</label>
								<select class="form-control" name="assigned_user_id" id="assigned_user_id" value="{{ old('assigned_user_id') }}">
									<option value="" selected>Choose One</option>
									@foreach ($users as $user)
									<option value="{{$user->id}}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>

				{{-- FORM BUTTONS --}}
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