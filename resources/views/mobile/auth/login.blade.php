@extends('mobile.layouts.auth')

@section('app_title')
    {{ __('Login') }}
@endsection

@section('frontend_content')
    <div id="appCapsule">
        <div class="section text-center">
            <img src="{{ asset('public/template/mobile/assets/img/illustration/login.png') }}" alt="img" class="imaged"
                style="width: 200px;">
        </div>

        <div class="section mt-2 text-center">
            <h1>{{ __('Log In') }}</h1>
            <h4>{{ __('Log In User Terdaftar') }}</h4>
        </div>

        <div class="section mb-5 p-2">
            <x-alert-message />

            <form method="POST" action="{{ route('mobile.login') }}">
                @csrf
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control" name="email" id="email1"
                                    value="{{ old('email') }}" placeholder="{{ __('Masukkan Email') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" id="password1"
                                    autocomplete="off" placeholder="{{ __('Masukkan Password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-links mt-2">
                    <div>
                        <a href="{{ route('mobile.register') }}">{{ __('Register') }}</a>
                    </div>
                    <div>
                        <a href="{{ route('mobile.password.request') }}" class="text-muted">{{ __('Lupa Password') }}</a>
                    </div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Log In') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
