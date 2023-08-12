@extends('member.layouts.auth')

@section('page_title')
    {{ __('Member Reset Password') }}
@endsection

@section('title')
    {{ __('Member Reset Password') }}
@endsection

@section('class_body', 'register-page')
@section('class_box', 'register-box')

@section('content')
    <div class="card-body">
        <p class="register-box-msg">{{ __('Reset password') }}</p>

        <form method="POST" action="{{ route('member.reset_password.send') }}">
            @csrf

            <x-alert-message />

            <div class="mb-3 input-group">
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ request()->email }}" placeholder="{{ __('Email') }}" required>
                <input type="hidden" value="{{ request()->token }}" name="token">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New Password') }}"
                    required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('New Password Confirmation') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
