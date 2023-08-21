@extends('layouts.admin.master')

@section('page_title')
    {{ __('Profile') }}
@endsection

@section('section_header_title')
    {{ __('Profile') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Profile') }}</div>
@endsection

@section('section_body_title')
    {{ __('Hi') }}, {{ $member->name ?? '' }}
@endsection

@section('section_body_lead')
    {{ __('Change information about yourself on this page') }}
@endsection

@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" action="{{ route('member.profile.update',auth()->guard('member')->user()->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h4>{{ __('Edit Profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <div id="image-preview" class="mx-auto image-preview">
                                    <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                    <input type="file" name="image" id="image-upload">
                                    <input type="hidden" name="old_image" value="{{ $member->image }}">
                                </div>
                                @error('image')
                                    <div class="mt-2 text-center text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label>{{ __('Name') }} <x-fill-field /></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $member->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email') ?? $member->email }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone') ?? $member->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Address') }}</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') ?? $member->address }}</textarea>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Residence') }}</label>
                                <input type="text" name="area" class="form-control"
                                    value="{{ old('area') ?? $member->area->residence->name }}" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Area') }}</label>
                                <input type="text" name="area" class="form-control"
                                    value="{{ old('area') ?? $member->area->name }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('Province') }}</label>
                                <input type="text" name="province" class="form-control"
                                    value="{{ old('province') ?? $member->area->province->name }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('City') }}</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ old('city') ?? $member->area->city->name }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('District') }}</label>
                                <input type="text" name="district" class="form-control"
                                    value="{{ old('district') ?? $member->area->district->name }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>{{ __('Village') }}</label>
                                <input type="text" name="village" class="form-control"
                                    value="{{ old('village') ?? $member->area->village->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-5">
            <div class="card">
                <form method="post" action="{{ route('member.profile_password.update', $member->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h4>{{ __('Update Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>{{ __('Current Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required>
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('New Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Confirm New Password') }} <x-fill-field /></label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.upload_preview')
@include('layouts.admin.includes.upload_preview_member')
