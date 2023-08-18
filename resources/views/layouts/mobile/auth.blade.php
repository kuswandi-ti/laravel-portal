<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.mobile.partials._meta')

    <title>{{ $setting['site_title'] ?? config('app.name') }} &mdash; @yield('app_title')</title>

    @include('layouts.mobile.includes.styles')
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/loading-icon.png') }}" alt="icon"
            class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->

    @include('layouts.mobile.includes.scripts')
</body>

</html>
