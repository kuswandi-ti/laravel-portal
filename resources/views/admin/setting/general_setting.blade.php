@extends('admin.layouts.master')

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

@section('backend_content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basic-configuration" data-toggle="tab"
                                href="#tab-basic-configuration" role="tab" aria-selected="true">
                                {{ __('Basic Setting') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-favicon" data-toggle="tab" href="#tab-logo-favicon" role="tab"
                                aria-selected="false">
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
                    <div class="tab-pane fade show active" id="tab-basic-configuration" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Basic Setting') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center mt-3">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">
                                        {{ __('Application Name') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6 col-md-9">
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
                                <div class="form-group row align-items-center mt-3">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">
                                        {{ __('Application Tagline') }}
                                    </label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" id="application_tagline" name="application_tagline"
                                            class="form-control @error('application_tagline') is-invalid @enderror"
                                            value="{{ old('application_tagline') ?? !empty($setting['application_tagline']) ? $setting['application_tagline'] : '' }}">
                                        @error('application_tagline')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mt-3">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">
                                        {{ __('Application Description') }}
                                    </label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('application_description') is-invalid @enderror" name="application_description">{{ old('application_description') ?? !empty($setting['application_description']) ? $setting['application_description'] : '' }}</textarea>
                                        @error('application_description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="tab-logo-favicon" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Logo & Favicon') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center mt-3">
                                    <div class="col-sm-6 col-md-12">
                                        <div class="text-center mb-3 ">{{ __('Logo') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['image_logo']))
                                                <img class="preview-path_image_logo"
                                                    src="{{ url(config('common.path_image_storage') . $setting['image_logo']) }}"
                                                    width="200">
                                            @else
                                                <img class="preview-path_image_logo"
                                                    src="{{ url(config('common.no_image_square')) }}" width="200">
                                            @endif
                                        </div>
                                        <div class="mb-3 custom-file">
                                            <input type="file" class="custom-file-input" id="logo" name="logo"
                                                onchange="preview('.preview-path_image_logo', this.files[0])">
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                            <input type="hidden" name="old_image_logo"
                                                value="{{ !empty($setting['image_logo']) ? $setting['image_logo'] : url(env('NO_IMAGE_SQUARE')) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mt-3">
                                    <div class="col-sm-6 col-md-12">
                                        <div class="text-center mb-3 ">{{ __('Favicon') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['image_favicon']))
                                                <img class="preview-path_image_favicon"
                                                    src="{{ url(config('common.path_image_storage') . $setting['image_favicon']) }}"
                                                    width="200">
                                            @else
                                                <img class="preview-path_image_favicon"
                                                    src="{{ url(config('common.no_image_square')) }}" width="200">
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

                <button class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                </button>
            </form>
        </div>
    </div>
@endsection

<x-swal />
