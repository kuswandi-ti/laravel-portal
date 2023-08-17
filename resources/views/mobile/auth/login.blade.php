@extends('mobile.layouts.auth')

@section('app_title')
    {{ __('Login') }}
@endsection

@section('frontend_content')
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
                                <label class="label" for="email1">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control" name="email" id="email1"
                                    value="{{ old('email') }}" placeholder="{{ __('Your Email') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" id="password1"
                                    autocomplete="off" placeholder="{{ __('Your Password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 form-links">
                    <div>
                        <a href="{{ route('mobile.register') }}">{{ __('Register') }}</a>
                    </div>
                    <div>
                        <a href="{{ route('mobile.forgot_password') }}" class="text-muted">{{ __('Forgot Password') }}</a>
                    </div>
                </div>

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Log In') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
