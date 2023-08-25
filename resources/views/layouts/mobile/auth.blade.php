<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.mobile.partials._meta')

    <title>{{ $setting['site_title'] ?? config('app.name') }} &mdash; @yield('app_title')</title>

    <link rel="icon" type="image/png"
        href="{{ url(config('common.path_storage') . (!empty($setting['company_favicon']) ? $setting['company_favicon'] : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
        sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset(config('common.path_template_mobile') . 'assets/img/icon/192x192.png') }}">

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
