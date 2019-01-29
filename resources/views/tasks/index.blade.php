@extends('layouts.app')

@section('content')
<div class="db-boxes-row row no-gutters mb-3">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-exclamation-circle"></i> Tasks
				<a href="/tasks/create" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-plus-square"></i>
					Create Tasks
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="text-left">Id</th>
							<th class="text-left">Task</th>
							<th class="text-left">Type</th>
							<th class="text-left">Priority</th>
							<th class="view-button text-left not-mobile-p">
								View
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tasks as $task)
							<tr>
								<td class="text-left">{{ $task->id }}</td>
								<td class="text-left">{{ $task->task }}</td>
								<td class="text-left">{{ $task->task_type->name }}</td>
								<td class="text-left">{{ $task->priority->name }}</td>
								<td class="view-button">
									<a href="/tasks/{{ $task->id }}" class="btn btn-secondary btn-sm view-link"><i class="fas fa-eye"></i></a>
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