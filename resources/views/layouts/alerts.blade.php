{{-- ALERT USERS OF MESSAGE - Confirmation when adding, editing, etc. entries --}}
@if($flash = session('message'))
	<div class="row">
		<div id="flash-message" class="col-md-12 alert alert-success" role="alert">
			<h6 class="mt-auto mb-auto">{{ $flash }}</h6>
		</div>
	</div>
@endif