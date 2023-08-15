@extends('member.layouts.master')

@section('page_title')
    {{ __('Profile') }}
@endsection

@section('title')
    {{ __('Profile') }}
@endsection

@section('sub_title')
    {{ __('Profile setting on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection

@includeIf('includes.select2')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon fas fa-cog"></i>&nbsp;
                        {{ __('Change Profile') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <form method="post"
                                action="{{ route('member.profile.update',auth()->guard('member')->user()->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Full Name') }} <x-fill-field /></label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value='{{ old('name') ?? $member->name }}' required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value='{{ old('email') ?? $member->email }}' readonly>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Phone') }}</label>
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') ?? $member->phone }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Full Address') }}</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3">{{ old('address') ?? $member->address }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Area') }}</label>
                                            <input type="text" name="area"
                                                class="form-control @error('area') is-invalid @enderror"
                                                value='{{ old('area') ?? $member->area->name }}' readonly>
                                            @error('area')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Province') }}</label>
                                            <input type="text" name="province"
                                                class="form-control @error('province') is-invalid @enderror"
                                                value='{{ old('province') ?? $member->area->province->name }}' readonly>
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('City') }}</label>
                                            <input type="text" name="city"
                                                class="form-control @error('city') is-invalid @enderror"
                                                value='{{ old('city') ?? $member->area->city->name }}' readonly>
                                            @error('city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('District') }}</label>
                                            <input type="text" name="district"
                                                class="form-control @error('district') is-invalid @enderror"
                                                value='{{ old('district') ?? $member->area->district->name }}' readonly>
                                            @error('district')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Village') }}</label>
                                            <input type="text" name="village"
                                                class="form-control @error('village') is-invalid @enderror"
                                                value='{{ old('village') ?? $member->area->village->name }}' readonly>
                                            @error('village')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="path_image">{{ __('Image Profile') }}</label>
                                            <div class="mb-3 text-center">
                                                @if ($member->count() == 0)
                                                    <img class="img-fluid preview-path_image"
                                                        src="{{ url(config('common.default_image_square')) }}"
                                                        width="300">
                                                @else
                                                    @if (!empty($member->image))
                                                        <img class="img-fluid preview-path_image"
                                                            src="{{ url(config('common.path_image_storage') . $member->image) }}"
                                                            width="300">
                                                    @else
                                                        <img class="img-fluid preview-path_image"
                                                            src="{{ url(config('common.default_image_square')) }}"
                                                            width="300">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="path_image" id="path_image"
                                                    class="custom-file-input @error('path_image') is-invalid @enderror"
                                                    onchange="preview('.preview-path_image', this.files[0])">
                                                <input type="hidden" name="old_image" value="{{ $member->image }}">
                                                <label class="custom-file-label"
                                                    for="path_image">{{ __('Choose file') }}</label>
                                                @error('path_image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />
