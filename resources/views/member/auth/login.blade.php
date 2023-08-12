@extends('member.layouts.auth')

@section('page_title')
    {{ __('Member Admin Login') }}
@endsection

@section('title')
    {{ __('Member Admin Login') }}
@endsection

@section('class_body', 'login-page')
@section('class_box', 'login-box')

@section('content')
    <div class="card-body">
        <p class="login-box-msg">{{ __('Fill your email and password') }}</p>

        <form method="POST" action="{{ route('member.login.post') }}">
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
            <div class="mb-3 input-group">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
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
            <div class="row">
                <div class="col-12">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>
            </div>
        </form>
        <p class="mt-3 mb-1 text-center">
            <a href="#">{{ __('Forgot Password') }}</a>
        </p>
        <p class="mb-1 text-center">
            <a href="{{ route('member.register') }}">{{ __('Register') }}</a>
        </p>
    </div>
@endsection
