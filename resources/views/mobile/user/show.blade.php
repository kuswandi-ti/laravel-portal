@extends('layouts.mobile.master')

@section('app_title')
    {{ __('User Detail') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-4 section">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <img src="http://localhost:8082/laravel-portal/public/storage/images/no_image_circle.png" alt="avatar"
                    class="rounded imaged w200">
            </div>
        </div>
    </div>

    <ul class="listview simple-listview mb-4">
        <li>
            <strong>Status</strong>
            <span class="text-success">Success</span>
        </li>
        <li>
            <strong>To</strong>
            <span>Jordi Santiago</span>
        </li>
        <li>
            <strong>To</strong>
            <span>Jordi Santiago</span>
        </li>
    </ul>
@endsection
