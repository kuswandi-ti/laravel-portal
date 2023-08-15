@push('styles_vendor')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush

@push('scripts_vendor')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/datatables.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_admin') . 'assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}">
    </script>
    <script src="{{ asset(config('common.path_template_admin') . 'assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        table = $("#table_data").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });

        table_active = $("#table_data_active").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });

        table_inactive = $("#table_data_inactive").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
