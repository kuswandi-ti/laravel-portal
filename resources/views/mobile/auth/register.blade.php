@extends('mobile.layouts.auth')

@section('app_title', 'Register')

@section('frontend_content')
    <div id="appCapsule">
        <div class="section text-center">
            <img src="{{ asset('public/template/mobile/assets/img/illustration/login.png') }}" alt="img" class="imaged"
                style="width: 200px;">
        </div>

        <div class="section mt-2 text-center">
            <h1>{{ __('Register') }}</h1>
            <h4>{{ __('Register User Baru') }}</h4>
        </div>

        <div class="section mb-5 p-2">
            <x-alert-message />

            <form method="POST" action="{{ route('mobile.register') }}">
                @csrf
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="name">{{ __('Nama Lengkap') }}</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}" placeholder="{{ __('Masukkan Nama Lengkap') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="{{ __('Masukkan Email') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Masukkan Password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password_confirmation">{{ __('Konfirmasi Password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="off"
                                    placeholder="{{ __('Masukkan Konfirmasi Password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-links mt-2">
                    <div>
                        <a href="{{ route('mobile.login') }}">{{ __('Login') }}</a>
                    </div>
                    <div>
                        <a href="{{ route('mobile.password.request') }}" class="text-muted">{{ __('Lupa Password') }}</a>
                    </div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
