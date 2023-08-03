<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset Password &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('public/template/backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('public/template/backend/assets/img/stisla-fill.svg') }}" alt="logo"
                                width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Reset Password</h4>
                            </div>
                            <div class="card-body">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            {{ session()->get('error') }}
                                        </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('backend.reset_password.send') }}"
                                    class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            tabindex="1" required autofocus value="{{ request()->email }}">
                                        <input type="hidden" value="{{ request()->token }}" name="token">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">New Password <span class="text-danger">*</span></label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            tabindex="1" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">New Password Confirmation <span
                                                class="text-danger">*</span></label>
                                        <input id="password" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" tabindex="1" required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Reset Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('public/template/backend/assets/js/scripts.js') }}"></script>
</body>

</html>
