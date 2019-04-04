$( document ).ready(function() {

	// ASSET IMAGE SELECT->SUBMIT
	$('#uploadFileField').change(function(){
		// Set .ajax variables
		var url = $(this).parent('#asset-img-form').attr("action");

		// Create FormData object
		var formData = new FormData();
			formData.append('asset_id', $("#asset_id").val());
			formData.append('image', $('#uploadFileField')[0].files[0]);

		// Grab CSRF Token from <head>
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		})

		// Trigger .ajax actions
		$.ajax({
		    url: url,
		    data: formData,
		    type: 'POST',
		    contentType: false, 
		    processData: false, 
		    success: function (data) {
				console.log('ajax complete');
				// Reload page + add ?openmodal=1 to url
				window.location = window.location.href + "?openmodal=1";
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});

		// Prevent default button action
	    return false;
	})

	// STORE NOTE
	$(".add-note-ajax").click(function(e){
		/* TO DO:
			1. Allow edit + delete functionality without a reload
		*/

		// Prevent default button action
		e.preventDefault();

		// Set .ajax variables
		var url = $("#add-note-modal").find("form").attr("action");

		// Set FormData array
		var formData = {
			user_id: $("#user_id").val(),
			account_id: $("#account_id").val(),
			asset_id: $("#asset_id").val(),
			company_id: $("#company_id").val(),
			tenant_id: $("#tenant_id").val(),
			status_id: $("#status_id").val(),
			note: $("#note-add").val(),
		};

		// Grab CSRF Token from <head>
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// Trigger .ajax actions
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: formData,
			success: function (data) {
				// Close Modal
				$(".modal").modal('hide');

				// Clear textfield after save
				$("#note-add").val('');

				// If 'No Note' div exists, remove it
				if ($('#no-note-note').length) {
					$('#no-note-note').remove();
				};

				// Trigger toastr.js success message
			    toastr.success('Your note was saved successfully!', 'Abigail Says...');

				// Append Newly Created Note <li>
				$(".notes-list").prepend(`
					<li class="notes-list-item">
						<div class="media note-item">
							<div class="media-side">
								<img src="`+ data[3] +`" class="mr-3 user-image" alt="Default User Avatar">
							</div>
							<div class="media-body">
								<h5 class="mt-0 author text-capitalize">`+ data[1] +`</h5>

								<div class="notes-button-set float-sm-right">
									<button type="button" class="btn btn-secondary btn-sm edit-note-link notes-button" data-toggle="modal" data-target="#edit-note-modal-`+ data[0].asset_id +`">
										<i class="fas fa-edit"></i>
									</button>
									
									<button type="button" class="notes-button btn btn-danger btn-sm delete-note-link" data-toggle="modal" data-target="#delete-note-modal-`+ data[0].asset_id +`">
										<i class="fas fa-trash-alt"></i>
									</button>
								</div>

								<span class="timeago float-right">`+ data[2] +`</span>

								<span class="text">`+ data[0].note +`</span>
							</div>
						</div>
					</li>
				`);
			},
			error: function (data) {
				// Trigger toastr.js error message
				toastr.error('An error has occurred please try again.', 'Abigail Says...');
				console.log('Error:', data);
			}
		});
	});

	// UPDATE NOTE
	$(".edit-note-ajax").click(function(e){
		// Prevent default button action
		e.preventDefault();

		// Set .ajax variables
		var note_id = $(this).val();

		// Set FormData array
		var formData = {
			id: $("#id-"+note_id).val(),
			user_id: $("#user_id-"+note_id).val(),
			status_id: $("#status_id-"+note_id).val(),
			edited_by_user_id: $("#edited_by_user_id-"+note_id).val(),
			account_id: $("#account_id-"+note_id).val(),
			asset_id: $("#asset_id-"+note_id).val(),
			company_id: $("#company_id-"+note_id).val(),
			tenant_id: $("#tenant_id-"+note_id).val(),
			note: $("#note-edit-"+note_id).val(),
		};

		// Grab CSRF Token from <head>
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// Trigger .ajax actions
		$.ajax({
			type: "PUT",
			url: "/notes/"+note_id,
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
		});
	});

	// 'DELETE' NOTE - Actually changes status_id to 2 (inactive)
	$(".delete-note-ajax").click(function(e){
		// Prevent default button action
		e.preventDefault();

		// Set .ajax variables
		var note_id = $(this).val();

		// Set FormData array
		var formData = {
			id: $("#del-id-"+note_id).val(),
			user_id: $("#del-user_id-"+note_id).val(),
			status_id: $("#del-status_id-"+note_id).val(),
			edited_by_user_id: $("#del-edited_by_user_id-"+note_id).val(),
			account_id: $("#del-account_id-"+note_id).val(),
			asset_id: $("#del-asset_id-"+note_id).val(),
			company_id: $("#del-company_id-"+note_id).val(),
			tenant_id: $("#del-tenant_id-"+note_id).val(),
			note: $("#del-note-"+note_id).val(),
		};

		// Grab CSRF Token from <head>
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// Trigger .ajax actions
		$.ajax({
			type: "PUT",
			url: "/notes/"+note_id,
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
		});
	});

	// STORE TASK - FORM ON TASK.SHOW - FOR ADDING A SUB-TASK
	$(".add-task-ajax").click(function(e){
		// Prevent default button action
		e.preventDefault();

		// Set .ajax variables
		var url = $("#add-task-modal").find("form").attr("action");

		// Set FormData array
		var formData = {
			task_id: $("#task_id").val(),
			account_id: $("#account_id").val(),
			company_id: $("#company_id").val(),
			asset_id: $("#asset_id").val(),
			task: $("#task").val(),
			task_type_id: $("#task_type_id").val(),
			due_date: $("#due_date").val(),
			priority_id: $("#priority_id").val(),
			repeats: $("#repeats").val(),
			assigned_user_id: $("#assigned_user_id").val(),
		};

		// Grab CSRF Token from <head>
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// Trigger .ajax actions
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

});
