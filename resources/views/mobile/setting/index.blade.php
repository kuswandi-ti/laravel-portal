@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Setting') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 text-center section">
        <div class="avatar-section">
            <a href="{{ route('mobile.profile_image.index') }}">
                <img src="{{ asset(config('common.path_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                    alt="avatar" class="rounded imaged w100">
                <span class="button">
                    <ion-icon name="camera-outline"></ion-icon>
                </span>
            </a>
        </div>
    </div>

    <div class="mt-1 listview-title">{{ __('Theme') }}</div>
    <ul class="listview image-listview text inset no-line">
        <li>
            <div class="item">
                <div class="in">
                    <div>{{ __('Dark Mode') }}</div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                        <label class="form-check-label" for="darkmodeSwitch"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <div class="mt-1 listview-title">{{ __('Notification') }}</div>
    <ul class="listview image-listview text inset">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        {{ __('Bill Reminder') }}
                        <div class="text-muted">
                            {{ __('Send a notification when the bill\'s due date is approaching') }}
                        </div>
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        {{ __('Payment Notification') }}
                        <div class="text-muted">
                            {{ __('Receive a notification if the payment process is successful') }}
                        </div>
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>{{ __('Notification Tone') }}</div>
                    <span class="text-primary">{{ __('Beep') }}</span>
                </div>
            </a>
        </li>
    </ul>

    <div class="mt-1 listview-title">{{ __('Profile Settings') }}</div>
    <ul class="listview image-listview text inset">
        <li>
            <a href="{{ route('mobile.profile_data.index') }}" class="item">
                <div class="in">
                    <div>{{ __('Update Data') }}</div>
                </div>
            </a>
        </li>
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        {{ __('Hide Important Profile Information') }}
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2">
                        <label class="form-check-label" for="SwitchCheckDefault2"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <div class="mt-1 listview-title">{{ __('Security') }}</div>
    <ul class="mb-2 listview image-listview text inset">
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>{{ __('Update Password') }}</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogBasic">
                <div class="in">
                    <div>
                        <form action="{{ route('mobile.logout') }}" method="post" id="form-logout">
                            @csrf
                            <span class="text-danger">{{ __('Sign Out on All Devices') }}</span>
                        </form>
                    </div>
                </div>
            </a>
        </li>
    </ul>

    <div class="mt-1 listview-title">{{ __('Help & Advice') }}</div>
    <ul class="mb-4 listview image-listview text inset">
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>{{ __('Help Center') }}</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>{{ __('Follow Our Fanpage') }}</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>{{ __('Rate Us') }}</div>
                </div>
            </a>
        </li>
    </ul>

    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-icon text-danger">
                    <ion-icon name="help-circle" role="img" class="md hydrated" aria-label="help-circle"></ion-icon>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure to logout?') }}</h5>
                </div>
                <div class="modal-body">
                    {{ __('After logging out will return to the website page') }}
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</a>
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal"
                            onclick="document.querySelector('#form-logout').submit()">{{ __('Yes') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
