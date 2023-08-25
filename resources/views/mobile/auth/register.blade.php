@extends('layouts.mobile.auth')

@section('app_title')
    {{ __('Register New User') }}
@endsection

@section('content')
    <div id="appCapsule">
        <div class="text-center section">
            <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" alt="img"
                class="imaged" style="width: 150px;">
        </div>

        <div class="mt-2 text-center section">
            <h1>{{ __('Register New User') }}</h1>
            <h4>{{ __('Register New User Confirmation') }}</h4>
        </div>

        <div class="p-2 mb-5 section">
            <x-alert-message />

            <form method="POST" action="{{ route('mobile.register.post') }}">
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
                                <label class="label" for="password">{{ __('New Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Your new password') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password_confirmation">{{ __('New Password Confirmation') }}
                                    <x-fill-field /></label>
                                <input type="password_confirmation" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="off"
                                    placeholder="{{ __('Your new password confirmation') }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        {{-- <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="street">{{ __('Street') }} <x-fill-field /></label>
                                <input type="text" class="form-control" name="street" id="street"
                                    value="{{ old('street') ?? $user->house_street_name }}"
                                    placeholder="{{ __('Your street name') }}" autofocus>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="btn btn-primary btn-block btn-lg mt-2 mb-2">{{ __('Confirmation Registration') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
