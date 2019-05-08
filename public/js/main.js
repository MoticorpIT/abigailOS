$(function(){

	/*------------------------------------------------------------\
	\	BOOTSTRAP INITIALIZERS
	\	- https://getbootstrap.com/docs/4.2/components/
	\------------------------------------------------------------*/
	// Tooltip Initializer
	$('[data-toggle="tooltip"]').tooltip({
		container: 'body'
	});


	/*------------------------------------------------------------\
	\	DATATABLE INITIALIZER
	\	- https://datatables.net/
	\	View files: accounts.index, assets.index, companies.index
	\		contracts.index, invoices.index, payments.index,
	\		tasks.index, tenants.index and users.index
	\------------------------------------------------------------*/
	$('.data-table').DataTable({
		responsive: true,
		"columnDefs": [
			{"targets": ["view-button"], "orderable": false}
		],
		"pageLength": 25,
		language: {
			search: "_INPUT_",
			searchPlaceholder: "Search...",
			"paginate": {
				"previous": "Prev"
			}
		}
	});


	/*------------------------------------------------------------\
	\	TOGGLE FOR MOBILE SIDEBAR MENU
	\	View files: layouts/sidebar
	\------------------------------------------------------------*/
	$('.toggle-nav').click(function() {
		$('.sidebar').toggleClass("open");
		$('html').toggleClass("sidebar-open");
	});
	$('.close-sidebar').click(function() {
		$('.sidebar').removeClass("open");
		$('html').removeClass("sidebar-open");
	});


	/*------------------------------------------------------------\
	\	TRIGGER FILE SELECTION WINDOW ON ASSET IMAGES MODAL
	\	View files: layouts/images-view
	\------------------------------------------------------------*/
	$('.uploadFileButton').on('click', function(){
		$('#uploadFileField').click();
	});


	/*------------------------------------------------------------\
	\	ENABLE UPLOAD BTN + SHOW FILE NAME ON FILE SELECTION
	\	View files: accounts.edit, companies.edit
	\		tenants.edit and users.edit
	\------------------------------------------------------------*/
	$('.single-file-upload').change(function(){
		if ($(this).val()) {
		// Enable Upload Button
		$('.single-file-upload-btn').removeAttr('disabled');
			let fileName = $(this).val().replace('C:\\fakepath\\', '');
			// Replace the "Choose a file" label
			$(this).next('.custom-file-label').html(fileName);
		}
	});


	/*------------------------------------------------------------\
	\	PASS TASK DATA TO TASK MODALS
	\	View files: dashboard, layouts/modals/task-complete,
	\		layouts/modals/task-reschedule
	\------------------------------------------------------------*/
	$('.task-modal-trigger').on('click', function() {
		let data = $(this).data();
		let cleanerDate = data.due_date.replace(' 00:00:00', '');
		$("#complete-task-modal #task-due-date-orig, #reschedule-task-modal #task-due-date-orig").val( cleanerDate );
		$("#complete-task-modal #task-description, #reschedule-task-modal #task-description").val( data.task );
		$("#complete-task-modal a[href], #reschedule-task-modal a[href]").attr('href', `/tasks/${data.id}/edit`);
    });


    /*------------------------------------------------------------\
	\	SHOW PROGRESS BAR DURING FILE UPLOAD
    \	View files: layouts/progressbar for accounts.edit,
    \       companies.edit, tenants.edit, users.edit
	\------------------------------------------------------------*/
    $('.single-file-upload-btn).on('click', function () {
        $('.edit-in-progress').removeClass('d-none');
        $('.message').html('Upload in Progress');
    })

});
