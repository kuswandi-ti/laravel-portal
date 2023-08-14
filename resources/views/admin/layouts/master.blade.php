<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') &mdash; {{ config('app.name') }}</title>

    <!-- Page Specific CSS File -->
    @stack('styles_vendor')

    @include('admin.includes.styles')

    <!-- Page Specific CSS File -->
    @stack('styles')

    <!-- Inline CSS -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('admin.layouts.partials._sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @stack('header_back')
                        <h1>@yield('section_header_title')</h1>
                        <div class="section-header-breadcrumb">
                            @section('section_header_breadcrumb')
                                <div class="breadcrumb-item active">
                                    <a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                                </div>
                            @show
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">@yield('section_body_title')</h2>
                        <p class="section-lead">
                            @yield('section_body_lead')
                        </p>
                        @yield('backend_content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    {{ __('Copyright') }} &copy; {{ date('Y') }} <div class="bullet"></div> {{ __('Design By') }} <a
                        href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @include('admin.includes.scripts')
    @stack('scripts_vendor')

    <!-- Page Specific JS File -->
    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset(config('common.path_template_admin') . 'assets/js/scripts.js') }}"></script>

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

            $('body').on('click', '.delete_item', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                })
            })
        });
    </script>
</body>

</html>
