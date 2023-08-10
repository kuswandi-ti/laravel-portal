@push('styles_vendor')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset(config('common.path_template_member') . 'plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_member') . 'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts_vendor')
    <!-- Select2 -->
    <script src="{{ asset(config('common.path_template_member') . 'plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $('.select2').select2({
            placeholder: '{{ isset($placeholder) ? $placeholder : '-' }}',
            closeOnSelect: true,
            allowClear: true,
        })
    </script>
@endpush
