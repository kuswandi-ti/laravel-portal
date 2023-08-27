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
            <h4>{{ __('Complete Register New User') }}</h4>
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
                                    value="{{ request()->email }}" placeholder="{{ __('Your email') }}" required readonly>
                                <input type="hidden" value="{{ request()->token }}" name="token">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="house_street_name">{{ __('Street') }} <x-fill-field /></label>
                                <input type="text" class="form-control" name="house_street_name" id="house_street_name"
                                    value="{{ $user->house_street_name }}" placeholder="{{ __('Your street name') }}"
                                    required readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="house_block">{{ __('Block') }}
                                            <x-fill-field /></label>
                                        <input type="text" class="form-control" name="house_block" id="house_block"
                                            value="{{ $user->house_block }}" placeholder="{{ __('Your block name') }}"
                                            required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="house_number">{{ __('No') }}
                                            <x-fill-field /></label>
                                        <input type="text" class="form-control" name="house_number" id="house_number"
                                            value="{{ $user->house_number }}" placeholder="{{ __('Your house number') }}"
                                            required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">{{ __('Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Your password') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password_confirmation">{{ __('Password Confirmation') }}
                                    <x-fill-field /></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="off"
                                    placeholder="{{ __('Your password confirmation') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="mt-2 mb-2 btn btn-primary btn-block btn-lg">{{ __('Complete Registration') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
