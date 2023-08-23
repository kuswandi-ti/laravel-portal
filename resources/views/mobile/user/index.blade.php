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
                                <span class="badge badge-info">{{ $user->getRoleNames()->first() }}</span>
                                <div class="text-muted">
                                    {{ $user->house_street_name }}, {{ $user->house_block }}/{{ $user->house_number }},
                                    {{ truncateString($user->house_address_others ?? '', 10) }}
                                </div>
                            </div>
                            <div>
                                @if ($user->getRoleNames()->isEmpty())
                                    <a href="{{ route('mobile.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                        {{ __('Edit') }}
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-bs-toggle="modal"
                                        data-bs-target="#DialogBasic">
                                        <form action="{{ route('mobile.user.destroy', $user->id) }}" method="post"
                                            id="form-delete">
                                            @csrf
                                            @method('DELETE')

                                            {{ __('Delete') }}
                                        </form>
                                    </a>
                                @endif
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

    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('mobile.user.destroy', 'id') }}" method="post">
                    @csrf
                    @method('DELETE')

                    <div class="modal-icon text-danger">
                        <ion-icon name="alert" role="img" class="md hydrated" aria-label="alert"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ __("You won't be able to revert this!") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </a>
                            <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal"
                                onclick="document.querySelector('#form-delete').submit()">
                                {{ __('Yes') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.mobile.includes.toast')
@endsection
