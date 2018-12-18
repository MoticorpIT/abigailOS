{{-- ALERTS USERS OF ERRORS - When adding, editing, etc. entries --}}
@if(count($errors))
	<div class="row">
		<div class="col-md-12 alert alert-danger">
			<h6 class="mt-2 font-600">Whoops! Looks like you missed something.</h6>
			<ul>
				@foreach ($errors->all() as $error)
				<li> {{ $error }} </li>
				@endforeach
			</ul>
		</div>
	</div>
@endif