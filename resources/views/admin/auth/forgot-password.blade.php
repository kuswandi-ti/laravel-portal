<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Forgot Password') }} &mdash; {{ config('app.name') }}</title>

    @include('admin.includes.styles')
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset(config('common.path_template_admin') . 'assets/img/stisla-fill.svg') }}"
                                alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ __('Forgot Password') }}</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one') }}
                                </p>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('admin.forgot_password.send') }}"
                                    class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }} <span
                                                class="text-danger">*</span></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Email Password Reset Link') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            {{ __('Copyright') }} &copy; Stisla {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.includes.scripts')
</body>

</html>
