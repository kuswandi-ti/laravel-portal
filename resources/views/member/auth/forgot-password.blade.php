@extends('member.layouts.auth')

@section('page_title')
    {{ __('Member Forgot Password') }}
@endsection

@section('title')
    {{ __('Member Forgot Password') }}
@endsection

@section('class_body', 'login-page')
@section('class_box', 'login-box')

@section('content')
    <div class="card-body">
        <p class="login-box-msg">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one') }}
        </p>

        <form method="POST" action="{{ route('member.forgot_password.send') }}">
            @csrf

            <x-alert-message />

            <div class="mb-3 input-group">
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="{{ __('Email') }}" autofocus>
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
            <div class="mt-3 row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
