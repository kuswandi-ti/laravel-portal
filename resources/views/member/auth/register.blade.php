@extends('member.layouts.auth')

@section('page_title')
    {{ __('Member Admin Register') }}
@endsection

@section('title')
    {{ __('Member Admin Register') }}
@endsection

@section('class_body', 'register-page')
@section('class_box', 'register-box')

@section('content')
    <div class="card-body">
        <p class="register-box-msg">{{ __('Register new member admin') }}</p>

        <form method="POST" action="{{ route('member.register.post') }}">
            @csrf

            <div class="mb-3 input-group">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="{{ __('Full name') }}" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    placeholder="{{ __('Email') }}">
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
            <div class="mb-3 input-group">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('Password Confirmation') }}">
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
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
        <p class="mt-3 mb-1 text-center">
            <a href="{{ route('member.login') }}">{{ __('Login') }}</a>
        </p>
    </div>
@endsection
