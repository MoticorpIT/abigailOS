$( document ).ready(function() {

	// IMAGE SELECT->SUBMIT
	$('#uploadFileField').on('change', function(){

		var url = $(this).parent('#uploadFileForm').attr("action");

		var formData = new FormData();
		formData.append('status_id', $("#statusIdField").val());
		formData.append('account_id', $("#accoutnIdField").val());
		formData.append('asset_id', $("#assetIdField").val());
		formData.append('company_id', $("#companyIdField").val());
		formData.append('tenant_id', $("#tenantIdField").val());
		formData.append('image', $('#uploadFileField')[0].files[0]); 

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		})

		$.ajax({
		    url: url,
		    data: formData,
		    type: 'POST',
		    contentType: false, 
		    processData: false, 
		    success: function (data) {
				console.log('ajax complete');
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});

	    return false;
	})

	// STORE NOTE
	$(".add-note-ajax").click(function(e){
		// PREVENT BUTTON'S DEFAULT BEHAVIOR
		e.preventDefault();

		// SET AJAX VARIABLES
		var url = $("#add-note-modal").find("form").attr("action");

		// SET FORM DATA VARIABLE
		var formData = {
			user_id: $("#user_id").val(),
			account_id: $("#account_id").val(),
			asset_id: $("#asset_id").val(),
			company_id: $("#company_id").val(),
			tenant_id: $("#tenant_id").val(),
			status_id: $("#status_id").val(),
			note: $("#note-add").val(),
		};

		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

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
		var note_id = $(this).val();

		// SET FORM DATA VARIABLE
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

		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// PERFORM AJAX
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
		// PREVENT BUTTON'S DEFAULT BEHAVIOR
		e.preventDefault();

		// SET AJAX VARIABLES
		var note_id = $(this).val();

		// SET FORM DATA VARIABLE
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

		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

		// PERFORM AJAX
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
		// PREVENT BUTTON'S DEFAULT BEHAVIOR
		e.preventDefault();

		// SET AJAX VARIABLES
		var url = $("#add-task-modal").find("form").attr("action");

		// SET FORM DATA VARIABLE
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

		// GRAB CSRF TOKEN FROM HTML HEAD
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});

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

});
