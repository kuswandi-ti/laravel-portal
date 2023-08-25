@extends('layouts.mobile.auth')

@section('app_title')
    {{ __('Login') }}
@endsection

@section('content')
    <div id="appCapsule">
        <div class="text-center section">
            <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" alt="img"
                class="imaged" style="width: 150px;">
        </div>

        <div class="mt-2 text-center section">
            <h1>{{ __('Log In') }}</h1>
            <h4>{{ __('Log In Registered User') }}</h4>
        </div>

        <div class="p-2 mb-5 section">
            <x-alert-message />

            <form method="POST" action="{{ route('mobile.login') }}">
                @csrf
                <div class="card">
                    <div class="pb-1 card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">{{ __('E-mail') }} <x-fill-field /></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="{{ __('Your email') }}" autofocus>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">{{ __('Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Your password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-2 mb-2">{{ __('Log In') }}</button>
                    <a href="{{ route('mobile.forgot_password') }}" class="text-muted">{{ __('Forgot Password') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
