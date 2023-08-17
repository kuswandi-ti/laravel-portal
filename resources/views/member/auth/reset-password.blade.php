@extends('layouts.admin.auth')

@section('page_title')
    {{ __('Member Admin Reset Password') }}
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
                    <h4>{{ __('Member Admin Reset Password') }}</h4>
                </div>
                <div class="card-body">

                    <x-alert-message />

                    <form method="POST" action="{{ route('member.reset_password.send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ request()->email }}" required>
                            <input type="hidden" value="{{ request()->token }}" name="token">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('New Password') }} <x-fill-field /></label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('New Password Confirmation') }} <x-fill-field /></label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Reset Password') }}
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
