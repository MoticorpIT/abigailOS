@extends('layouts.app')

@section('content')

<style>
	.data-table tbody .task-high { border-left: 10px solid #f8d7da !important; }
	.data-table tbody .task-med { border-left: 10px solid #fff3cd !important; }
</style>

<div class="db-boxes-row row no-gutters mb-3">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-exclamation-circle"></i> Tasks
				<a href="{{ route('tasks.create') }}" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-plus-square"></i>
					Create Tasks
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="text-left">ID</th>
							<th>Status</th>
							<th class="text-left">Task</th>
							<th class="text-left">Assigned To</th>
							<th class="view-button text-left not-mobile-p">
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tasks as $task)
							@php
								switch ($task->priority_id) {
									case '3':
										$priority = 'high';
										break;
									case '2':
										$priority = 'med';
										break;
									default:
										$priority = '';
										break;
								}
							@endphp
							<tr class="task-{{ $priority }}">
								<td class="text-left">{{ $task->id }}</td>
								<td>
									<form method="POST" action="{{ route('tasks.update', $task) }}">
										@csrf @method('PUT')
										<a href="#" name="submit">
											<i class="fas fa-check-circle {{ $task->is_complete == 1 ? 'text-success' : 'text-muted' }}"></i>
										</a>
									</form>
								</td>
								<td class="text-left">{{ $task->task }}</td>
								<td class="text-left text-capitalize">{{ $task->user->name }}</td>
								<td class="view-button" style="display:flex">
									<a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm view-link">
										<i class="fas fa-eye"></i>
									</a>
									<a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btn-sm view-link">
										<i class="fas fa-pencil-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->
		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection