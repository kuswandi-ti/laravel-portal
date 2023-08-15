@push('scripts_vendor')
    <script
        src="{{ asset(config('common.path_template_admin') . 'assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}">
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset(config('common.path_image_storage') . $admin->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
