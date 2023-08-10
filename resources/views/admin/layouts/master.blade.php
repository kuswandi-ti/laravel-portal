<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') &mdash; {{ config('app.name') }}</title>

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
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
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
            $('body').on('click', '.delete_item', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
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

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
</body>

</html>
