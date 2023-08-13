<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') &mdash; {{ config('app.name') }}</title>

    @stack('styles_vendor')
    @include('member.includes.styles')
    @stack('styles')
</head>

<body class="hold-transition @yield('class_body')">
    <div class="@yield('class_box')">
        <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
        </div>
        <div class="card card-outline card-primary">
            <div class="text-center card-header">
                <a href="#" class="h2">
                    <b>@yield('title')</b>
                </a>
            </div>
            @yield('content')
        </div>
    </div>

    @include('member.includes.scripts')
    @stack('scripts_vendor')
    @stack('scripts')
</body>

</html>
