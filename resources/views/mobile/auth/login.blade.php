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
            <div class="mb-4 alert alert-primary alert-dismissible fade show" role="alert">
                <div class="row">
                    <div class="col">
                        <span class="text-warning">STAFF</span><br>
                        Email : <strong>ketua@mail.com</strong><br>
                        Password : <strong>password</strong>
                    </div>
                    <div class="col">
                        <span class="text-warning">USER</span><br>
                        Email : <strong>kuswandi@mail.com</strong><br>
                        Password : <strong>password</strong>
                    </div>
                </div>
            </div>

            <x-alert-message />

            <form method="POST" action="{{ route('mobile.login') }}">
                @csrf
                <div class="card">
                    <div class="pb-1 card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">{{ __('E-mail') }} <x-fill-field /></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="{{ __('Your email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">{{ __('Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Your password') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="mt-2 mb-2 btn btn-primary btn-block btn-lg">{{ __('Log In') }}</button>
                    <a href="{{ route('mobile.forgot_password') }}" class="text-muted">{{ __('Forgot Password') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
