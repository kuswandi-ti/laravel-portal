@extends('layouts.mobile.master')

@section('app_title')
    {{ __('User List') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="section mt-4">
        <div class="section-heading">
            <h2 class="title">User List</h2>
            <a href="{{ route('mobile.user.create') }}" class="link">Add New</a>
        </div>
        <div class="transactions">
            <a class="item">
                <div class="detail">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/brand/1.jpg') }}"
                        alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Mr. Fajri Rahmat Alindra</strong>
                        <p>Gang III, Blok F3 No. 41</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-info">
                        <ion-icon name="create-outline"></ion-icon> Edit
                    </div>
                    <div class="price text-danger">
                        <ion-icon name="trash-outline"></ion-icon> Delete
                    </div>
                </div>
            </a>
            <a class="item">
                <div class="detail">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/brand/1.jpg') }}"
                        alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Mr. Muhammad Afnan Alindra</strong>
                        <p>Gang III, Blok F3 No. 41</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-info">
                        <ion-icon name="create-outline"></ion-icon> Edit
                    </div>
                    <div class="price text-danger">
                        <ion-icon name="trash-outline"></ion-icon> Delete
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
