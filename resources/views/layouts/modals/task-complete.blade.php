<!-- Complete Task Modal -->
<div class="modal fade" id="complete-task-modal" tabindex="-1" role="dialog" aria-labelledby="complete-task-modal-heading" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="complete-task-modal-heading">
					<i class="far fa-check-circle"></i>
					Complete Task
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
							<div class="task-balance-amount-group">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="task-amount-paid">Balance Due:</label>
											<div class="input-group">
												<input type="text" readonly disabled class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
												<div class="input-group-append">
													<div class="input-group-text">
														<i class="fas fa-file-invoice-dollar"></i>
													</div>
												</div>
											</div> <!-- input group -->
										</div> <!-- form group -->
									</div> <!-- col -->
									<div class="col-6">
										<div class="form-group">
											<label for="task-amount-paid">Amount Paid:</label>
											<div class="input-group">
												<input type="text" class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
												<div class="input-group-append">
													<div class="input-group-text">
														<i class="fas fa-clipboard-check"></i>
													</div>
												</div>
											</div> <!-- input group -->
										</div> <!-- form group -->
									</div> <!-- col -->
								</div> <!-- row -->
							</div> <!-- task-balance-amount-group -->
							<div class="form-group flexed">
								<label for="task-amount-paid">Remaining Balance:</label>
								<div class="input-group">
									<input type="text" class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
									<div class="input-group-append">
										<div class="input-group-text">
											<i class="fas fa-file-invoice-dollar"></i>
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
				<button type="button" class="switch-link" data-dismiss="modal" data-toggle="modal" data-target="#reschedule-task-modal">
					<i class="fas fa-sync-alt"></i>
					Reschedule this task instead?
				</button>
				<a href="" class="btn btn-secondary">
					<i class="fas fa-edit"></i>
					Edit Task
				</a>
				<button type="button" class="btn btn-primary btn-green">
					<i class="far fa-check-circle"></i>
					Complete Task
				</button>
			</div>
		</div>
	</div>
</div> <!-- complete task modal -->
