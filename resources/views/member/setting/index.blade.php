@extends('layouts.admin.master')

@section('page_title')
    {{ __('Setting') }}
@endsection

@section('section_header_title')
    {{ __('Setting') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Setting') }}</div>
@endsection

@section('section_body_title')
    {{ __('Setting') }}
@endsection

@section('section_body_lead')
    {{ __('View information about setting on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="setting1" data-toggle="tab" href="#tab-setting1" role="tab"
                                aria-selected="true">
                                {{ __('Area') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-setting2" data-toggle="tab" href="#tab-setting2" role="tab"
                                aria-selected="false">
                                {{ __('Sytem') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-setting3" data-toggle="tab" href="#tab-setting3" role="tab"
                                aria-selected="false">
                                {{ __('Notification') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-setting4" data-toggle="tab" href="#tab-setting4" role="tab"
                                aria-selected="false">
                                {{ __('Payment') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-setting5" data-toggle="tab" href="#tab-setting5" role="tab"
                                aria-selected="false">
                                {{ __('Logo') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content no-padding" id="myTab2Content">
                <div class="tab-pane fade show active" id="tab-setting1" role="tabpanel">
                    <form method="post" action="{{ route('member.setting_area.update', $area->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Area') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Area Name, Cluster, or Others') }} <x-fill-field /></label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') ?? $area->name }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('RT') }} <x-fill-field /></label>
                                            <input type="text" name="rt"
                                                class="form-control @error('rt') is-invalid @enderror"
                                                value="{{ old('rt') ?? $area->rt }}" required>
                                            @error('rt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('RW') }} <x-fill-field /></label>
                                            <input type="text" name="rw"
                                                class="form-control @error('rw') is-invalid @enderror"
                                                value="{{ old('rw') ?? $area->rw }}" required>
                                            @error('rw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('Postal Code') }} <x-fill-field /></label>
                                            <input type="text" name="postal_code"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                value="{{ old('postal_code') ?? $area->postal_code }}" required>
                                            @error('postal_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Full Address') }} <x-fill-field /></label>
                                            <textarea name="full_address" class="form-control @error('full_address') is-invalid @enderror" rows="3" required>{{ old('full_address') ?? $area->full_address }}</textarea>
                                            @error('full_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Residence') }}</label>
                                            <input type="text" name="residence_name"
                                                class="form-control @error('residence_name') is-invalid @enderror"
                                                value="{{ old('residence_name') ?? $area->residence->name }}" readonly>
                                            @error('residence_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Province') }}</label>
                                            <input type="text" name="province"
                                                class="form-control @error('province') is-invalid @enderror"
                                                value="{{ old('province') ?? $area->province->name }}" readonly>
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('City') }}</label>
                                            <input type="text" name="city"
                                                class="form-control @error('city') is-invalid @enderror"
                                                value="{{ old('city') ?? $area->city->name }}" readonly>
                                            @error('city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('District') }}</label>
                                            <input type="text" name="district"
                                                class="form-control @error('district') is-invalid @enderror"
                                                value="{{ old('district') ?? $area->district->name }}" readonly>
                                            @error('district')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Village') }}</label>
                                            <input type="text" name="village"
                                                class="form-control @error('village') is-invalid @enderror"
                                                value="{{ old('village') ?? $area->village->name }}" readonly>
                                            @error('village')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="tab-setting2" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Sytem') }}</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="tab-setting3" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Notification') }}</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="tab-setting4" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Payment Gateway (Midtrans)') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Mode') }} <span class="text-danger">*</span></label>
                                        <select id="midtrans_mode" name="midtrans_mode"
                                            class="form-control @error('midtrans_mode') is-invalid @enderror" required>
                                            <option value="" selected disabled>{{ __('Choose one ...') }}
                                            </option>
                                            <option value="sandbox"
                                                {{ !empty($setting['midtrans_mode']) ? ($setting['midtrans_mode'] == 'sandbox' ? 'selected' : '') : '' }}>
                                                {{ __('Sandbox') }}</option>
                                            <option value="production"
                                                {{ !empty($setting['midtrans_mode']) ? ($setting['midtrans_mode'] == 'production' ? 'selected' : '') : '' }}>
                                                {{ __('Production') }}</option>
                                        </select>
                                        @error('midtrans_mode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Merchant ID') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="midtrans_merchant_id" name="midtrans_merchant_id"
                                            class="form-control @error('midtrans_merchant_id') is-invalid @enderror"
                                            value="{{ !empty($setting['midtrans_merchant_id']) ? $setting['midtrans_merchant_id'] : '' }}"
                                            required>
                                        @error('midtrans_merchant_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Client Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="midtrans_client_key" name="midtrans_client_key"
                                            class="form-control @error('midtrans_client_key') is-invalid @enderror"
                                            value="{{ !empty($setting['midtrans_client_key']) ? $setting['midtrans_client_key'] : '' }}"
                                            required>
                                        @error('midtrans_client_key')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Server Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="midtrans_server_key" name="midtrans_server_key"
                                            class="form-control @error('midtrans_server_key') is-invalid @enderror"
                                            value="{{ !empty($setting['midtrans_server_key']) ? $setting['midtrans_server_key'] : '' }}"
                                            required>
                                        @error('midtrans_server_key')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Bank Transfer') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="tab-setting5" role="tabpanel">
                    <form method="post" action="{{ route('member.setting_logo.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Logo') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting_member['member_logo']))
                                                <img class="preview-member_logo"
                                                    src="{{ url(config('common.path_image_storage') . $setting_member['member_logo']) }}"
                                                    width="400" height="400">
                                            @else
                                                <img class="preview-member_logo"
                                                    src="{{ url(config('common.no_image_square')) }}" width="400"
                                                    height="400">
                                            @endif
                                        </div>
                                        <div class="mb-3 custom-file">
                                            <input type="file" class="custom-file-input" id="member_logo"
                                                name="member_logo"
                                                onchange="preview('.preview-member_logo', this.files[0])">
                                            <label class="custom-file-label"
                                                for="member_logo">{{ __('Choose file') }}</label>
                                            <input type="hidden" name="old_member_logo"
                                                value="{{ !empty($setting_member['member_logo']) ? $setting_member['member_logo'] : config('common.no_image_square') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.select2')
