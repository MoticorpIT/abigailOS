$(function(){
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body'
  });

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

  var url = window.location.href;
  var modalToOpen = url.substring(url.indexOf("#"));
  
  if(window.location.href.indexOf(modalToOpen) != -1) {
      $(modalToOpen).modal("show");
  }

});
