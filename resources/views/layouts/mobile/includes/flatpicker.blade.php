@push('styles_vendor')
    <link rel="stylesheet" href="{{ asset(config('common.path_template_mobile') . 'assets/css/flatpickr.min.css') }}">
@endpush

@push('scripts_vendor')
    <script src="{{ asset(config('common.path_template_mobile') . 'assets/js/plugins/flatpickr.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(".flatpickr").flatpickr();
    </script>
@endpush
