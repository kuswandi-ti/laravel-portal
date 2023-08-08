<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @includeIf('mobile.layouts.partials.meta')

    <title>{{ config('app.name') }} | @yield('app_title')</title>

    @includeIf('mobile.includes.styles')

    @stack('styles_vendor')
    @stack('styles')
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('public/template/mobile/assets/img/loading-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    {{-- @includeIf('layouts.frontend.partials.header') --}}
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('frontend_content')
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    @if (isset($app_bottom_menu))
        @if ($app_bottom_menu == 1)
            @includeIf('mobile.layouts.partials.bottom_menu')
        @endif
    @else
        @includeIf('mobile.layouts.partials.bottom_menu')
    @endif
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    @includeIf('mobile.layouts.partials.sidebar')

    @includeIf('mobile.includes.scripts')

    @stack('scripts_vendor')
    @stack('scripts')
</body>

</html>
