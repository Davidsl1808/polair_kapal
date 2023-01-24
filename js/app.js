// Call the dataTables jQuery plugin
$(document).ready(function() {
  var t = $('#dataTable').DataTable({
        "columnDefs": [ {
            "visible": false,
            "targets": -1,
        } ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        scrollCollapse: true,
        paging:         true,
        scrollY:        '70vh',
        "scrollX": true
        });

 
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

    var table = $('#dataTable1').DataTable({
        "columnDefs": [ {
            "visible": false,
            "targets": -1,
        } ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        scrollCollapse: true,
        paging:         true,
        scrollY:        '70vh',
        "scrollX": true
        });

    
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
});
