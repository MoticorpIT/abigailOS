$(function(){
  // Bootstrap Initializers
  // https://getbootstrap.com/docs/4.2/components/
  // Tooltip Initializer
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body'
  });

  // DataTable Initializer
  // https://datatables.net/
  $('.data-table').DataTable({
    responsive: true,
    "columnDefs": [
      { "targets": ["view-button"], "orderable": false}
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

  // Toggle for mobile sidebar menu
  $('.toggle-nav').click(function() {
    $('.sidebar').toggleClass("open");
    $('html').toggleClass("sidebar-open");
  });
  $('.close-sidebar').click(function() {
    $('.sidebar').removeClass("open");
    $('html').removeClass("sidebar-open");
  });

  // Trigger File Selection Window on Image Modal
  $('.uploadFileButton').on('click', function(){
    $('#uploadFileField').click();
  });

  // Enable Upload Button And Show File Name Once File is Selected
  $('.single-file-upload').change(function(){
	if ($(this).val()) {
	  // Enable Upload Button
	  $('.single-file-upload-btn').removeAttr('disabled');
      let fileName = $(this).val().replace('C:\\fakepath\\', '');
      // Replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
	} 
  });

  // Pass task collection to task modal on dashboard
  $('.task-modal-trigger').on('click', function() {
  	let data = $(this).data();
  	$("#complete-task-modal #task-due-date-orig, #reschedule-task-modal #task-due-date-orig").val( data.due_date );
  	$("#complete-task-modal #task-description, #reschedule-task-modal #task-description").val( data.task );
  	$("#complete-task-modal a[href], #reschedule-task-modal a[href]").attr('href', `/tasks/${data.id}/edit`);
  });

});
