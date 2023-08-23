@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image_preview').css({
                "background-image": "url({{ asset(config('common.path_storage') . $user->image) }})",
                "background-size": "auto",
                "background-position": "center center",
                "background-repeat": "no-repeat",
            });
        });
    </script>
@endpush
