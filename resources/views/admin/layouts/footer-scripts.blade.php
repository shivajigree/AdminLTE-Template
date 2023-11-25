<script data-navigate-once src="{{asset('js/app.js')}}"></script>
<!-- Bootstrap 4 -->
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script data-navigate-once src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script data-navigate-once src="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script data-navigate-once>
    $(function () {
        var t = $('#table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [ {
                "searchable": true,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 0, 'asc' ]]
        });

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();
    } );

</script>

@stack('js')
