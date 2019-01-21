{{-- ALERT USERS OF MESSAGE - Confirmation when adding, editing, etc. entries --}}

@if($flash = session('message'))
	<script>
		$(document).ready(function() {
			// Toastr Initializer
			// https://codeseven.github.io/toastr/
			function toastrOptions(){
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "2500",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
			};

			toastrOptions();
			toastr.info("{{ $flash }}");
		});
	</script>
@endif
