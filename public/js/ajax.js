$( document ).ready(function() {

	// STORE NOTE
	$(".add-note-ajax").click(function(e){
		// PREVENT BUTTON'S DEFAULT BEHAVIOR
		e.preventDefault();

		// SET AJAX VARIABLES
		var url = $("#add-note-modal").find("form").attr("action");

		// SET FORM DATA VARIABLE
		var formData = {
			user_id: $("#add-note-modal").find("input[name='user_id']").val(),
			company_id: $("#add-note-modal").find("input[name='company_id']").val(),
			status_id: $("#add-note-modal").find("input[name='status_id']").val(),
			note: document.getElementById("note-add").value,
		};
		
		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		})

		// PERFORM AJAX
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: formData,
			success: function (data) {
				// Close Modal
				$(".modal").modal('hide');
				// Reload Page
				location.reload();
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// UPDATE NOTE
	$(".edit-note-ajax").click(function(e){
		// PREVENT BUTTON'S DEFAULT BEHAVIOR
		e.preventDefault();

		// SET AJAX VARIABLES
		var url = $("#edit-note-modal").find("form").attr("action");
		var link_id = $("#edit-note-modal").find("input[name='id']").val();

		// SET FORM DATA VARIABLE
		var formData = {
			id: $("#edit-note-modal").find("input[name='id']").val(),
			user_id: $("#edit-note-modal").find("input[name='user_id']").val(),
			status_id: $("#edit-note-modal").find("input[name='status_id']").val(),
			edited_by_user_id: $("#edit-note-modal").find("input[name='edited_by_user_id']").val(),
			company_id: $("#edit-note-modal").find("input[name='company_id']").val(),
			note: document.getElementById("note-edit").value,
		};

		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		})

		// PERFORM AJAX
		$.ajax({
			type: "PUT",
			url: "/notes/"+link_id,
			data: formData,
			success: function (data) {
				// Close Modal
				$(".modal").modal('hide');
				// Reload Page
				location.reload();
			},
			error: function (data) {
				console.log('Error: ',data);
			}
		})
	});

});