<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/components.css') }}">

    @stack('styles_vendor')

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

    @stack('styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('backend.layouts.partials._sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('backend_content')
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('public/template/backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/js/stisla.js') }}"></script>

    @stack('scripts_vendor')

    <!-- Page Specific JS File -->
    <script src="{{ asset('public/template/backend/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('public/template/backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
