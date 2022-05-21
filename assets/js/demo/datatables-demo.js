// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({               
      'order':[],
      'columnDefs': [{
          "targets": [-1],
          "orderable": false
      }]
  });
});

