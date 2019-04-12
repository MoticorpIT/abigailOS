<!-- Reschedule Task Modal -->
<div class="modal fade" id="reschedule-task-modal" tabindex="-1" role="dialog" aria-labelledby="reschedule-task-modal-heading" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reschedule-task-modal-heading">
					<i class="fas fa-history"></i>
					When should we reschedule?
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container task-form-container">
					<form class="row task-form reschedule-task-form">
						<div class="col-6 task-details">
							<div class="form-group flexed">
								<label for="task-due-date-orig">Task Due Date:</label>
								<div class="input-group">
									<input type="text" readonly disabled class="form-control" id="task-due-date-orig" value="">
									<div class="input-group-append">
										<div class="input-group-text">
											<i class="fas fa-calendar-alt"></i>
										</div>
									</div>
								</div> <!-- input group -->
							</div> <!-- form group -->
							<div class="form-group">
								<label for="task-description">Task Description:</label>
								<textarea readonly disabled class="form-control" id="task-description" rows="5" value=""></textarea>
							</div> <!-- form group -->
						</div> <!-- col -->
						<div class="col-6">
							<div class="form-group flexed">
								<label for="task-quick-reschedule">Quick Reschedule:</label>
								<div class="input-group">
									<select class="form-control" id="task-quick-reschedule">
										<option>2 days from now</option>
										<option>1 week from now</option>
										<option>2 weeks from now</option>
										<option>1 month from now</option>
									</select>
								</div> <!-- input group -->
							</div> <!-- form group -->
							<div class="form-group flexed">
								<label for="task-due-date-new">New Due Date:</label>
								<div class="input-group">
									<input type="date" class="form-control" id="task-due-date-new">
									<div class="input-group-append">
										<div class="input-group-text">
											<i class="fas fa-calendar-alt"></i>
										</div>
									</div>
								</div> <!-- input group -->
							</div> <!-- form group -->
							<div class="form-group">
								<label for="task-note">Add a note:</label>
								<textarea class="form-control" id="task-note" rows="2" placeholder="You can add an optional note..."></textarea>
							</div> <!-- form group -->
						</div> <!-- col -->
					</form> <!-- row -->
				</div> <!-- container -->
			</div>
			<div class="modal-footer">
				<button type="button" class="switch-link" data-dismiss="modal" data-toggle="modal" data-target="#complete-task-modal">
					<i class="fas fa-sync-alt"></i>
					Complete this task instead?
				</button>
				<a href="" class="btn btn-secondary">
					<i class="fas fa-edit"></i>
					Edit Task
				</a>
				<button type="button" class="btn btn-primary">
					<i class="fas fa-history"></i>
					Reschedule Task
				</button>
			</div>
		</div>
	</div>
</div> <!-- reschedule task modal -->