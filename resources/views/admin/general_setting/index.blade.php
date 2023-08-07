@extends('admin.layouts.master')

@section('page_title')
    {{ __('General Setting') }}
@endsection

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

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All General Setting') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.general_setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basic-configuration" data-toggle="tab"
                                            href="#tab-basic-configuration" role="tab" aria-controls="home"
                                            aria-selected="true">Basic Configuration</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="logo-favicon" data-toggle="tab" href="#tab-logo-favicon"
                                            role="tab" aria-controls="profile" aria-selected="false">Logo & Favicon</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="tab-basic-configuration" role="tabpanel"
                                        aria-labelledby="basic-configuration">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>{{ __('Application Name') }}</label>
                                                <input type="text" id="application_name" name="application_name"
                                                    class="form-control @error('application_name') is-invalid @enderror"
                                                    value="{{ old('application_name') ?? !empty($setting['application_name']) ? $setting['application_name'] : '' }}"
                                                    required>
                                                @error('application_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>{{ __('Currency') }}</label>
                                                <input type="text" id="currency_code" name="currency_code"
                                                    class="form-control @error('currency_code') is-invalid @enderror"
                                                    value="{{ old('currency_code') ?? !empty($setting['currency_code']) ? $setting['currency_code'] : '' }}"
                                                    required>
                                                @error('currency_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>{{ __('Currency Symbol') }}</label>
                                                <input type="text" id="currency_symbol" name="currency_symbol"
                                                    class="form-control @error('currency_symbol') is-invalid @enderror"
                                                    value="{{ old('currency_symbol') ?? !empty($setting['currency_symbol']) ? $setting['currency_symbol'] : '' }}"
                                                    required>
                                                @error('currency_symbol')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-logo-favicon" role="tabpanel"
                                        aria-labelledby="logo-favicon">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="logo">Logo</label>
                                                <div class="mb-3 text-center">
                                                    @if (!empty($setting['image_logo']))
                                                        <img class="preview-path_image_logo"
                                                            src="{{ url(env('PATH_IMAGE_STORAGE') . $setting['image_logo']) }}"
                                                            width="200" height="200">
                                                    @else
                                                        <img class="preview-path_image_logo"
                                                            src="{{ url(env('NO_IMAGE_SQUARE')) }}" width="200"
                                                            height="200">
                                                    @endif
                                                </div>
                                                <div class="mb-3 custom-file">
                                                    <input type="file" class="custom-file-input" id="logo"
                                                        name="logo"
                                                        onchange="preview('.preview-path_image_logo', this.files[0])">
                                                    <label class="custom-file-label" for="logo">Choose file</label>
                                                    <input type="hidden" name="old_image_logo"
                                                        value="{{ !empty($setting['image_logo']) ? $setting['image_logo'] : url(env('NO_IMAGE_SQUARE')) }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="favicon">Favicon</label>
                                                <div class="mb-3 text-center">
                                                    @if (!empty($setting['image_favicon']))
                                                        <img class="preview-path_image_favicon"
                                                            src="{{ url(env('PATH_IMAGE_STORAGE') . $setting['image_favicon']) }}"
                                                            width="200" height="200">
                                                    @else
                                                        <img class="preview-path_image_favicon"
                                                            src="{{ url(env('NO_IMAGE_SQUARE')) }}" width="200"
                                                            height="200">
                                                    @endif
                                                </div>
                                                <div class="mb-3 custom-file">
                                                    <input type="file" class="custom-file-input" id="favicon"
                                                        name="favicon"
                                                        onchange="preview('.preview-path_image_favicon', this.files[0])">
                                                    <label class="custom-file-label" for="favicon">Choose file</label>
                                                    <input type="hidden" name="old_image_favicon"
                                                        value="{{ !empty($setting['image_favicon']) ? $setting['image_favicon'] : url(env('NO_IMAGE_SQUARE')) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                &nbsp;
                            </div>
                            <div class="text-center form-group col-9">
                                <button class="mt-3 btn btn-primary">
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

@push('scripts')
    <script></script>
@endpush

<x-swal />
