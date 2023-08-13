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
                                            <label>{{ __('Company Name') }} <span class="text-danger">*</span></label>
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
                                            <label>{{ __('Site Title') }} <span class="text-danger">*</span></label>
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
                                            <label>{{ __('Company Phone') }} <span class="text-danger">*</span></label>
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
                                            <label>{{ __('Company Email') }} <span class="text-danger">*</span></label>
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
                                            <label>{{ __('Company Address') }} <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('company_address') is-invalid @enderror" required>{{ old('company_address') ?? !empty($setting['company_address']) }}</textarea>
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
                                            <label>{{ __('Default Date Format') }} <span
                                                    class="text-danger">*</span></label>
                                            <select id="date_format" name="date_format"
                                                class="form-control select2 @error('date_format') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>-- {{ __('Select') }} --</option>
                                                <option value="Y-m-d"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'Y-m-d' ? 'selected' : '') : '' }}>
                                                    Y-m-d ({{ date('Y-m-d') }})</option>
                                                <option value="d-m-Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd-m-Y' ? 'selected' : '') : '' }}>
                                                    d-m-Y ({{ date('d-m-Y') }})</option>
                                                <option value="d/m/Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd/m/Y' ? 'selected' : '') : '' }}>
                                                    d/m/Y ({{ date('d/m/Y') }})</option>
                                                <option value="m-d-Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'm-d-Y' ? 'selected' : '') : '' }}>
                                                    m-d-Y ({{ date('m-d-Y') }})</option>
                                                <option value="m.d.Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'm.d.Y' ? 'selected' : '') : '' }}>
                                                    m.d.Y ({{ date('m.d.Y') }})</option>
                                                <option value="m/d/Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'm/d/Y' ? 'selected' : '') : '' }}>
                                                    m/d/Y ({{ date('m/d/Y') }})</option>
                                                <option value="d.m.Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd.m.Y' ? 'selected' : '') : '' }}>
                                                    d.m.Y ({{ date('d.m.Y') }})</option>
                                                <option value="d/M/Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd/M/Y' ? 'selected' : '') : '' }}>
                                                    d/M/Y ({{ date('d/M/Y') }})</option>
                                                <option value="d/M/Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd/M/Y' ? 'selected' : '') : '' }}>
                                                    M/d/Y ({{ date('M/d/Y') }})</option>
                                                <option value="d M, Y"
                                                    {{ old('date_format') ?? !empty($setting['date_format']) ? ($setting['date_format'] == 'd M, Y' ? 'selected' : '') : '' }}>
                                                    d M, Y ({{ date('d M, Y') }})</option>
                                            </select>
                                            @error('date_format')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Default Time Format') }} <span
                                                    class="text-danger">*</span></label>
                                            <select id="time_format" name="time_format"
                                                class="form-control select2 @error('time_format') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>-- {{ __('Select') }} --
                                                </option>
                                                <option value="h:i:sA"
                                                    {{ old('time_format') ?? !empty($setting['time_format']) ? ($setting['time_format'] == 'h:i:sA' ? 'selected' : '') : '' }}>
                                                    12 Hour(s) ({{ date('h:i:sA') }})</option>
                                                <option value="H:i:s"
                                                    {{ old('time_format') ?? !empty($setting['time_format']) ? ($setting['time_format'] == 'H:i:s' ? 'selected' : '') : '' }}>
                                                    24 Hour(s) ({{ date('H:i:s') }})</option>
                                            </select>
                                            @error('time_format')
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
                                            <label>{{ __('Default Currency') }} <span class="text-danger">*</span></label>
                                            <select id="currency" name="currency"
                                                class="form-control select2 @error('currency') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>-- {{ __('Select') }} --
                                                </option>
                                                <option value="rp"
                                                    {{ old('currency') ?? !empty($setting['currency']) ? ($setting['currency'] == 'rp' ? 'selected' : '') : '' }}>
                                                    Rp</option>
                                            </select>
                                            @error('currency')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Default Language') }} <span class="text-danger">*</span></label>
                                            <select id="language" name="language"
                                                class="form-control select2 @error('language') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>-- {{ __('Select') }} --
                                                </option>
                                                @foreach ($default_language as $lang)
                                                    <option value="{{ $lang->lang }}"
                                                        {{ old('language') ?? !empty($setting['language']) ? ($setting['language'] == 'id' ? 'selected' : '') : '' }}>
                                                        {{ $lang->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('language')
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
                                        <div class="mb-3 text-center ">{{ __('Logo') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['image_logo']))
                                                <img class="preview-path_image_logo"
                                                    src="{{ url(config('common.path_image_storage') . $setting['image_logo']) }}"
                                                    width="400" height="400">
                                            @else
                                                <img class="preview-path_image_logo"
                                                    src="{{ url(config('common.no_image_square')) }}" width="400"
                                                    height="400">
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
                                    <div class="col-md-6" style="border: 1px solid #f8a100;">
                                        <div class="mb-3 text-center ">{{ __('Favicon') }}</div>
                                        <div class="mb-3 text-center">
                                            @if (!empty($setting['image_favicon']))
                                                <img class="preview-path_image_favicon"
                                                    src="{{ url(config('common.path_image_storage') . $setting['image_favicon']) }}"
                                                    width="400" height="400">
                                            @else
                                                <img class="preview-path_image_favicon"
                                                    src="{{ url(config('common.no_image_square')) }}" width="400"
                                                    height="400">
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

@include('admin.includes.select2')
