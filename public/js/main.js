$(function(){
  // Tooltip Initializer
  // https://getbootstrap.com/docs/4.2/components/tooltips/
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

  // Captures Hashtag string in url to
  // navigate to page and open bootstrap modal
  var url = window.location.href;
  var modalToOpen = url.substring(url.indexOf("#"));

  if(window.location.href.indexOf(modalToOpen) != -1) {
      $(modalToOpen).modal("show");
  }

  // Toggle for mobile sidebar menu
  $('.toggle-nav').click(function() {
    $('.sidebar').toggleClass("open");
    $('body').toggleClass("sidebar-open");
  });
  $('.close-sidebar').click(function() {
    $('.sidebar').removeClass("open");
    $('body').removeClass("sidebar-open");
  });
});
