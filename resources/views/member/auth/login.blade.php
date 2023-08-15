@extends('layouts.admin.auth')

@section('page_title')
    {{ __('Member Admin Login') }}
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
                    <h4>{{ __('Member Admin Login') }}</h4>
                </div>

                <div class="card-body">
                    <x-alert-message />

                    <form method="POST" action="{{ route('member.login.post') }}">
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
                            <div class="d-block">
                                <label for="password" class="control-label">{{ __('Password') }} <x-fill-field /></label>
                                <div class="float-right">
                                    <a href="{{ route('member.forgot_password') }}" class="text-small">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                </div>
                            </div>
                            <input name="password" type="password" class="form-control @error('email') is-invalid @enderror"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group text-center">
                            <a href="{{ route('member.register') }}">
                                {{ __('Register') }}
                            </a>
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
