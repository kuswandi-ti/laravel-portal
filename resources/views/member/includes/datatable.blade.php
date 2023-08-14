@push('styles_vendor')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_member') . 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_member') . 'plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_member') . 'plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('scripts_vendor')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset(config('common.path_template_member') . 'plugins/datatables/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_member') . 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_member') . 'plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_member') . 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_member') . 'plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ asset(config('common.path_template_member') . 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
    </script>
@endpush

@push('scripts')
    <script>
        $('.table_active').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endpush
