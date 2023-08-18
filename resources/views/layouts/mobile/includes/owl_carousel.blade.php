@push('styles_vendor')
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_mobile') . 'assets/js/plugins/OwlCarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_mobile') . 'assets/js/plugins/OwlCarousel/assets/owl.theme.default.min.css') }}">
@endpush

@push('scripts_vendor')
    <script src="{{ asset(config('common.path_template_mobile') . 'assets/js/plugins/OwlCarousel/owl.carousel.min.js') }}">
    </script>
@endpush

@push('scripts')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true
        });

        var owlInfo = $('.owl-carousel-info');
        owlInfo.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true
        });

        var owlNews = $('.owl-carousel-news');
        owlNews.owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true
        });
    </script>
@endpush
