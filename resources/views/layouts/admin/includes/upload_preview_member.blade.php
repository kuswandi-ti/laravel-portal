@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset(config('common.path_image_storage') . $member->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
