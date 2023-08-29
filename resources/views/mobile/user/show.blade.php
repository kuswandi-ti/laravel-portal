@extends('layouts.mobile.master')

@section('app_title')
    {{ __('User Detail') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-4 section">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <img src="{{ asset(config('common.path_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                    alt="avatar" class="rounded imaged w100">
            </div>
        </div>
    </div>

    <div class="listview-title mt-2">{{ __('General') }}</div>
    <ul class="listview simple-listview mb-4">
        <li>
            <strong>{{ __('Name') }}</strong>
            <span class="text-success">{{ $user->name ?? '' }}</span>
        </li>
        <li>
            <strong>{{ __('Gender') }}</strong>
            <span>{{ __(capitalAllWord($user->gender) ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Marital Status') }}</strong>
            <span>{{ __(capitalAllWord($user->marital_status) ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Place of Birth') }}</strong>
            <span>{{ __($user->place_of_birth ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Birth of Date') }}</strong>
            <span>{{ __($user->date_of_birth ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Profession') }}</strong>
            <span>{{ __($user->profession ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Workplace') }}</strong>
            <span>{{ __($user->workplace ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Religion') }}</strong>
            <span>{{ __(capitalAllWord($user->religion) ?? '') }}</span>
        </li>
    </ul>

    <div class="listview-title mt-2">{{ __('ID & Contact') }}</div>
    <ul class="listview simple-listview mb-4">
        <li>
            <strong>{{ __('Email') }}</strong>
            <span>{{ $user->email ?? '' }}</span>
        </li>
        <li>
            <strong>{{ __('Phone') }}</strong>
            <span>{{ __($user->phone ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Family Card No') }}</strong>
            <span>{{ __($user->family_card_no ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('ID Card No') }}</strong>
            <span>{{ __($user->id_card_no ?? '') }}</span>
        </li>
    </ul>

    <div class="listview-title mt-2">{{ __('House') }}</div>
    <ul class="listview simple-listview mb-4">
        <li>
            <strong>{{ __('Street') }}</strong>
            <span>{{ $user->house_street_name ?? '' }}</span>
        </li>
        <li>
            <strong>{{ __('Block') }}</strong>
            <span>{{ __($user->house_block ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('No') }}</strong>
            <span>{{ __($user->house_number ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('Address Others') }}</strong>
            <span>{{ __($user->house_address_others ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('House Ownership') }}</strong>
            <span>{{ __(capitalAllWord($user->house_ownership) ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('House Stay') }}</strong>
            <span>{{ __(capitalAllWord($user->house_stay) ?? '') }}</span>
        </li>
        <li>
            <strong>{{ __('House Note') }}</strong>
            <span>{{ __($user->house_note ?? '') }}</span>
        </li>
    </ul>
@endsection
