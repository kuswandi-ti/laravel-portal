@extends('layouts.mobile.master')

@section('app_title')
    {{ __('User List') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="listview-title mt-2">
        <div class="section-heading">
            <h2 class="title">{{ __('User List') }}</h2>
            <a href="{{ route('mobile.user.create') }}" class="link">{{ __('Register New User') }}</a>
        </div>
    </div>
    <ul class="listview image-listview media inset mb-4">
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <li>
                    <div class="item">
                        <div class="imageWrapper">
                            <img src="{{ url(config('common.path_storage') . (!empty($user->image) ? $user->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                {{ $user->name }}
                                <div class="text-muted">
                                    {{ $user->house_street_name }}, {{ $user->house_block }}/{{ $user->house_number }},
                                    {{ truncateString($user->house_address_others ?? '', 10) }}
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('mobile.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    {{ __('Edit') }}
                                </a>
                                <a href="" class="btn btn-danger btn-sm">
                                    {{ __('Delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/brand/1.jpg') }}"
                            alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            {{ __('Data is Empty') }}
                            <div class="text-muted">{{ __('Data is Empty') }}</div>
                        </div>
                    </div>
                </a>
            </li>
        @endif
    </ul>

    @include('layouts.mobile.includes.toast')
@endsection

<x-mobile-toast />
