<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') &mdash; {{ config('app.name') }}</title>

    <!-- Page Specific CSS File -->
    @stack('styles_vendor')

    @include('member.includes.styles')

    <!-- Page Specific CSS File -->
    @stack('styles')

    <!-- Inline CSS -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake"
                src="{{ asset(config('common.path_template_member') . 'dist/img/AdminLTELogo.png') }}" height="60"
                width="60">
        </div>

        @includeIf('member.layouts.partials._header')

        @includeIf('member.layouts.partials._sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                            <small>@yield('sub_title')</small>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('member.dashboard.index') }}">{{ __('Home') }}</a></li>
                                @show
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @includeIf('member.layouts.partials._footer')
    </div>

    @include('member.includes.scripts')
    @stack('scripts_vendor')

    <!-- Page Specific JS File -->
    @stack('scripts')

    <!-- AdminLTE App -->
    <script src="{{ asset(config('common.path_template_member') . 'dist/js/adminlte.js') }}"></script>

    <!-- Inline JS -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.custom-file-input').on('change', function() {
            let filename = $(this)
                .val()
                .split('\\')
                .pop()
            $(this)
                .next('.custom-file-label')
                .addClass('selected')
                .html(filename)
        })

        function preview(target, image) {
            $(target)
                .attr('src', window.URL.createObjectURL(image))
                .show()
        }

        $(document).ready(function() {
            $('body').on('click', '.logout', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure to logout?',
                    text: "After logging out will return to the login page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, logging out !'
                }).then((result) => {
                    if (result.value === true) {
                        $('#form-logout').submit()
                    }
                })
            })
        });
    </script>
</body>

</html>
