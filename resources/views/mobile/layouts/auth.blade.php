<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @includeIf('mobile.layouts.partials.meta')

    <title>{{ config('app.name') }} | @yield('app_title')</title>

    @includeIf('mobile.includes.styles')
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('public/template/mobile/assets/img/loading-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('frontend_content')
    </div>
    <!-- * App Capsule -->

    @includeIf('mobile.includes.scripts')
</body>

</html>
