<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') &mdash; {{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/template/backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/template/backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    @stack('styles_vendor')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/components.css') }}">

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

    <!-- General JS Scripts -->
    <script src="{{ asset('public/template/backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('public/template/backend/assets/modules/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/template/backend/assets/modules/datatables/datatables.min.js') }}"></script>
    <script
        src="{{ asset('public/template/backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset('public/template/backend/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}">
    </script>
    <script src="{{ asset('public/template/backend/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    @stack('scripts_vendor')

    <!-- Page Specific JS File -->
    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('public/template/backend/assets/js/scripts.js') }}"></script>

    <!-- Inline JS -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
