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

    @stack('styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('backend.layouts.partials._sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('section-header-title')</h1>
                        <div class="section-header-breadcrumb">
                            @section('section-header-breadcrumb')
                                <div class="breadcrumb-item active">
                                    <a href="{{ route('backend.dashboard') }}">{{ __('Dashboard') }}</a>
                                </div>
                            @show
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">@yield('section-body-title')</h2>
                        <p class="section-lead">
                            @yield('section-body-lead')
                        </p>
                        @yield('backend_content')
                    </div>
                </section>
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

    <!-- Template JS File -->
    <script src="{{ asset('public/template/backend/assets/js/scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>
