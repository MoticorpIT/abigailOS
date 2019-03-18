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

  // Submit Form on Image Selection on Image Modal
  // $('#uploadFileField').change(function() {
	// $("#add-image-btn").click();
  // });

  // Submit Form with Button Outside of Form
  // for users, assets, companies, tenants, accounts
  $('#edit-btn').click(function(e) {
  	e.preventDefault();
	$('#data-form').submit();
  });

  // Enable Upload Button Once File is Selected
  // And Show File Name After Selecting but Before Uploading
  $('#avatar-upload').change(function(){
	if ($(this).val()) {
	  // Enable Upload Button
	  $('#avatar-upload-btn').removeAttr('disabled');
	  // Get the file name
      let fileName = $(this).val();
      // Strip the crap off the filename
      let cleanFileName = fileName.replace('C:\\fakepath\\', '');
      // Replace the "Choose a file" label
      $(this).next('.custom-file-label').html(cleanFileName);
	} 
  });

});
