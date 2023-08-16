<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting['site_title'] ?? config('app.name') }} &mdash; @yield('page_title')</title>

    <link rel="icon"
        href="{{ url(config('common.path_image_storage') . (!empty($setting['company_favicon']) ? $setting['company_favicon'] : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
        type="image/*">

    @stack('styles_vendor')
    @include('layouts.admin.includes.styles')
    @stack('styles')
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                @yield('content')
            </div>
        </section>
    </div>

    @include('layouts.admin.includes.scripts')
    @stack('scripts_vendor')
    @stack('scripts')
</body>

</html>
