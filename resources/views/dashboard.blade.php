@extends('layouts.app')

@section('content')
<div class="content-area">
	<div  class="db-info-bar-row row">
		<div class="col-6 col-md-3">
			<div class="db-info-bar-box db-box">
				<span class="label">tenants w/ rent due</span>
				<span class="text">12</span>
			</div> <!-- db-info-bar-box -->
		</div> <!-- col -->
		<div class="col-6 col-md-3">
			<div class="db-info-bar-box db-box">
				<span class="label">tenants w/ rent overdue</span>
				<span class="text">8</span>
			</div> <!-- db-info-bar-box -->
		</div> <!-- col -->
		<div class="col-6 col-md-3">
			<div class="db-info-bar-box db-box">
				<span class="label">Assets w/ items due</span>
				<span class="text">23</span>
			</div> <!-- db-info-bar-box -->
		</div> <!-- col -->
		<div class="col-6 col-md-3">
			<div class="db-info-bar-box db-box">
				<span class="label">Assets w/ items overdue</span>
				<span class="text">9</span>
			</div> <!-- db-info-bar-box -->
		</div> <!-- col -->
	</div> <!-- db-info-bar row -->

	<div class="db-boxes-row row">
		<div class=" col-6">
			<div class="notifications db-box">
				<h2 class="heading">
					Notifications
					<span class="button-area">
						<span class="task-sum">
							<span class="overdue" data-toggle="tooltip" data-placement="left" title="Overdue">4</span>
							<span class="divider"> / </span>
							<span class="total" data-toggle="tooltip" data-placement="right" title="Total">11</span>
						</span> <!-- task sum -->

						<a href="#0" class="badge badge-secondary">View All</a>
					</span> <!-- button area -->
					<div class="clear"></div>
				</h2>
				<ul class="db-box-list">
					<li class="overdue">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="overdue">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="overdue">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="overdue">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="warning">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="warning">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li class="warning">
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li>
						<div class="task-link-wrapper">
							<a href="#0" class="task-link">
								Curabitur blandit tempus porttitor.
							</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li>
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li>
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
					<li>
						<div class="task-link-wrapper">
							<a href="#0" class="task-link" data-toggle="modal" data-target="#complete-task-modal">Curabitur blandit tempus porttitor.</a>
							<div class="task-link-dropdown dropdown">
								<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
									<div class="btn-group" role="group" aria-label="Complete Task">
										<span data-toggle="modal" data-target="#reschedule-task-modal">
											<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
												<i class="fas fa-history"></i>
											</button>
										</span>
										<span data-toggle="modal" data-target="#complete-task-modal">
											<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
												<i class="far fa-check-circle"></i>
											</button>
										</span>
									</div> <!-- btn group -->
								</div>
							</div> <!-- task link dropdown -->
						</div> <!-- task link wrapper -->
					</li>
				</ul> <!-- db box list -->
				<nav aria-label="Dashboard Box Navigation">
					<ul class="pagination pagination-sm">
						<li class="page-item first-item arrow-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li class="page-item prev-item arrow-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&lsaquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item next-item arrow-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&rsaquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
						<li class="page-item last-item arrow-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav> <!-- pagination -->
			</div> <!-- db box -->
		</div> <!-- col -->
		<div class="col-6">
			<div class="tasks db-box">

				<h2 class="heading">
					Tasks
					<span class="button-area">
						<span class="task-sum">
							<span class="overdue" data-toggle="tooltip" data-placement="left" title="Overdue">{{ $overdueCount }}</span>
							<span class="divider"> / </span>
							<span class="total" data-toggle="tooltip" data-placement="right" title="Total">{{ $tasks->total() }}</span>
						</span> <!-- task sum -->

						<a href="{{ route('tasks.index') }}" class="badge badge-secondary">View All</a>
					</span> <!-- button area -->
					<div class="clear"></div>
				</h2>
				
				<ul class="db-box-list">
					@foreach($tasks as $task)
						@php
							switch ($task->priority_id) {
								case '3':
									$priority = 'overdue';
									break;

								case '2':
									$priority = 'warning';
									break;
								
								default:
									$priority = '';
									break;
							}
						@endphp
						<li class="{{ $priority }}">
							<div class="task-link-wrapper">
								<a href="{{ route('tasks.show', $task) }}" class="task-link" data-toggle="modal" data-target="#complete-task-modal">
									{{ $task->task }}
								</a>
								<div class="task-link-dropdown dropdown">
									<a class="task-link-arrow dropdown-toggle" href="#" id="task-link-dd1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="far fa-circle" data-template='<i class="fas fa-chevron-circle-down"></i>'></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-link-dd1">
										<div class="btn-group" role="group" aria-label="Complete Task">
											<span data-toggle="modal" data-target="#reschedule-task-modal">
												<button type="button" class="btn btn-secondary reschedule" data-toggle="tooltip" data-delay="500" data-placement="left" title="Reschedule">
													<i class="fas fa-history"></i>
												</button>
											</span>
											<span data-toggle="modal" data-target="#complete-task-modal">
												<button type="button" class="btn btn-secondary complete" data-toggle="tooltip" data-delay="500" data-placement="right" title="Complete">
													<i class="far fa-check-circle"></i>
												</button>
											</span>
										</div> <!-- btn group -->
									</div>
								</div> <!-- task link dropdown -->
							</div> <!-- task link wrapper -->
						</li>
					@endforeach
				</ul> <!-- db box list -->

				<nav aria-label="Dashboard Box Navigation">
					{{ $tasks->links() }}
					
					{{-- <ul class="pagination pagination-sm">
						<li class="page-item first-item arrow-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li class="page-item prev-item arrow-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&lsaquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item next-item arrow-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&rsaquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
						<li class="page-item last-item arrow-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul> --}}

				</nav> <!-- pagination -->
			</div> <!-- db box -->
		</div> <!-- col -->
	</div> <!-- boxes wrapper -->
</div>

@include('layouts/modals/task-complete')
@include('layouts/modals/task-reschedule')

@endsection


