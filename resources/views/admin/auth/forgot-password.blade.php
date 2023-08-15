@extends('layouts.admin.auth')

@section('page_title')
    {{ __('Admin Forgot Password') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset(config('common.path_template_admin') . 'assets/img/stisla-fill.svg') }}" alt="logo"
                    width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Admin Forgot Password') }}</h4>
                </div>
                <div class="card-body">
                    <p>
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one') }}
                    </p>

                    <x-alert-message />

                    <form method="POST" action="{{ route('admin.forgot_password.send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
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
@endsection
