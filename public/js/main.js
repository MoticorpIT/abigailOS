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

  

});
