@extends('layouts.admin.master')

@section('page_title')
    {{ __('General Setting') }}
@endsection

@push('header_back')
    <div class="section-header-back">
        <a href="javascript:history.back()" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
@endpush

@section('section_header_title')
    {{ __('General Setting') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('General Setting') }}</div>
@endsection

@section('section_body_title')
    {{ __('General Setting') }}
@endsection

@section('section_body_lead')
    {{ __('View information about general setting on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basic-setting" data-toggle="tab" href="#tab-basic-setting"
                                role="tab" aria-selected="true">
                                {{ __('Basic Setting') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-favicon-setting" data-toggle="tab" href="#tab-logo-favicon-setting"
                                role="tab" aria-selected="false">
                                {{ __('Logo & Favicon') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="{{ route('admin.general_setting.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="tab-content no-padding" id="myTab2Content">
                    <div class="tab-pane fade show active" id="tab-basic-setting" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Basic Setting') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Company Name') }} <x-fill-field /></label>
                                            <input type="text" id="company_name" name="company_name"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                value="{{ old('company_name') ?? !empty($setting['company_name']) ? $setting['company_name'] : '' }}"
                                                required>
                                            @error('company_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Site Title') }} <x-fill-field /></label>
                                            <input type="text" id="site_title" name="site_title"
                                                class="form-control @error('site_title') is-invalid @enderror"
                                                value="{{ old('site_title') ?? !empty($setting['site_title']) ? $setting['site_title'] : '' }}"
                                                required>
                                            @error('site_title')
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
                                            <label>{{ __('Company Phone') }} <x-fill-field /></label>
                                            <input type="text" id="company_phone" name="company_phone"
                                                class="form-control @error('company_phone') is-invalid @enderror"
                                                value="{{ old('company_phone') ?? !empty($setting['company_phone']) ? $setting['company_phone'] : '' }}"
                                                required>
                                            @error('company_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Company Email') }} <x-fill-field /></label>
                                            <input type="text" id="company_email" name="company_email"
                                                class="form-control @error('company_email') is-invalid @enderror"
                                                value="{{ old('company_email') ?? !empty($setting['company_email']) ? $setting['company_email'] : '' }}"
                                                required>
                                            @error('company_email')
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
                                            <label>{{ __('Company Address') }} <x-fill-field /></label>
                                            <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address" required>{{ old('company_address') ?? !empty($setting['company_address']) ? $setting['company_address'] : '' }}</textarea>
                                            @error('company_address')
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
                                            <label>{{ __('Default Date Format') }} <x-fill-field /></label>
                                            <select id="default_date_format" name="default_date_format"
                                                class="form-control select2 @error('default_date_format') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                @foreach ($format_dates as $code => $text)
                                                    <option value="{{ $code }}"
                                                        {{ old('default_date_format') ?? !empty($setting['default_date_format']) ? ($setting['default_date_format'] == $code ? 'selected' : '') : '' }}>
                                                        {{ $text }}</option>
                                                @endforeach
                                            </select>
                                            @error('default_date_format')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Default Time Format') }} <x-fill-field /></label>
                                            <select id="default_time_format" name="default_time_format"
                                                class="form-control select2 @error('default_time_format') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                @foreach ($format_times as $code => $text)
                                                    <option value="{{ $code }}"
                                                        {{ old('default_time_format') ?? !empty($setting['default_time_format']) ? ($setting['default_time_format'] == $code ? 'selected' : '') : '' }}>
                                                        {{ $text }}</option>
                                                @endforeach
                                            </select>
                                            @error('default_time_format')
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
                                            <label>{{ __('Default Currency') }} <x-fill-field /></label>
                                            <select id="default_currency" name="default_currency"
                                                class="form-control select2 @error('default_currency') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                @foreach ($currencies as $code => $text)
                                                    <option value="{{ $code }}"
                                                        {{ old('default_currency') ?? !empty($setting['default_currency']) ? ($setting['default_currency'] == $code ? 'selected' : '') : '' }}>
                                                        {{ $text }}</option>
                                                @endforeach
                                            </select>
                                            @error('default_currency')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Default Language') }} <x-fill-field /></label>
                                            <select id="default_language" name="default_language"
                                                class="form-control select2 @error('default_language') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                @foreach ($default_language as $code => $text)
                                                    <option value="{{ $code }}"
                                                        {{ old('default_language') ?? !empty($setting['default_language']) ? ($setting['default_language'] == $code ? 'selected' : '') : '' }}>
                                                        {{ $text }}</option>
                                                @endforeach
                                            </select>
                                            @error('default_language')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="tab-logo-favicon-setting" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Logo & Favicon') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6" style="border: 1px solid #f8a100; border-right-style: none">
                                        <div class="mb-3 mt-3 text-center">{{ __('Logo') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['company_logo']))
                                                <img class="preview-company_logo"
                                                    src="{{ url(config('common.path_image_storage') . $setting['company_logo']) }}"
                                                    width="400" height="400">
                                            @else
                                                <img class="preview-company_logo"
                                                    src="{{ url(config('common.no_image_square')) }}" width="400"
                                                    height="400">
                                            @endif
                                        </div>
                                        <div class="mb-3 custom-file">
                                            <input type="file" class="custom-file-input" id="company_logo"
                                                name="company_logo"
                                                onchange="preview('.preview-company_logo', this.files[0])">
                                            <label class="custom-file-label"
                                                for="company_logo">{{ __('Choose file') }}</label>
                                            <input type="hidden" name="old_company_logo"
                                                value="{{ !empty($setting['company_logo']) ? $setting['company_logo'] : url(config('common.no_image_square')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="border: 1px solid #f8a100; border-right-style: none">
                                        <div class="mb-3 mt-3 text-center">{{ __('Favicon') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['company_favicon']))
                                                <img class="preview-company_favicon"
                                                    src="{{ url(config('common.path_image_storage') . $setting['company_favicon']) }}"
                                                    width="400" height="400">
                                            @else
                                                <img class="preview-company_favicon"
                                                    src="{{ url(config('common.no_image_square')) }}" width="400"
                                                    height="400">
                                            @endif
                                        </div>
                                        <div class="mb-3 custom-file">
                                            <input type="file" class="custom-file-input" id="company_favicon"
                                                name="company_favicon"
                                                onchange="preview('.preview-company_favicon', this.files[0])">
                                            <label class="custom-file-label"
                                                for="company_favicon">{{ __('Choose file') }}</label>
                                            <input type="hidden" name="old_company_favicon"
                                                value="{{ !empty($setting['company_favicon']) ? $setting['company_favicon'] : url(config('common.no_image_square')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                </button>
            </form>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.select2')
