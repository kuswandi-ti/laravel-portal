<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Top News HTML template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/template/frontend/css/styles.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Header news -->
    @include('frontend.layouts.partials._header')
    <!-- End Header news -->

    @yield('frontend_content')

    <!-- Footer section -->
    @include('frontend.layouts.partials._footer')
    <!-- End footer section -->

    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('public/template/frontend/js/index.bundle.js') }}"></script>
</body>

</html>
