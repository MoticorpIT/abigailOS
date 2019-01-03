$(function(){
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body'
  });

  $('.data-table').DataTable({
    responsive: true,
    "columnDefs": [
        { "targets": [9], "orderable": false}
    ]
  });

});
