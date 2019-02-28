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

  // File upload button
  $('.uploadFileButton').on('click', function(){
    $('#uploadFileField').click();
  });

  // Submit Form with Button Outside of Form
  $('#edit-btn').click(function(e) {
  	e.preventDefault();
	$('#data-form').submit();
  });

  // Enable Upload Button Once File is Selected
  // And Show File Name After Selecting but Before Uploading
  $('input:file').change(function(){
	if ($(this).val()) {
	  $('#avatar-upload').removeAttr('disabled');
	  //get the file name
      var fileName = $(this).val();
      var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(cleanFileName);
	} 
  });

  

});
