@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Notification Setting') }}
@endsection

@push('header_back')
    <div class="section-header-back">
        <a href="javascript:history.back()" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
@endpush

@section('section_header_title')
    {{ __('admin.Notification Setting') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Notification Setting') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Notification Setting') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about notification setting on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="email-setting" data-toggle="tab" href="#tab-email-setting"
                                role="tab" aria-selected="true">
                                {{ __('admin.Email Setting') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="push-notification-setting" data-toggle="tab"
                                href="#tab-push-notification-setting" role="tab" aria-selected="false">
                                {{ __('admin.Push Notification Setting') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="{{ route('admin.notification_setting.update') }}">
                @csrf
                @method('PUT')

                <div class="tab-content no-padding" id="myTab2Content">
                    <div class="tab-pane fade show active" id="tab-email-setting" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('admin.Email Setting') }}</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('admin.Mail Type') }} <x-fill-field /></label>
                                            <select id="mail_type" name="mail_type"
                                                class="form-control @error('mail_type') is-invalid @enderror" required>
                                                <option value="" selected disabled>-- {{ __('admin.Select') }} --
                                                </option>
                                                <option value="smtp"
                                                    {{ old('mail_type') ?? !empty($setting['mail_type']) ? ($setting['mail_type'] == 'smtp' ? 'selected' : '') : '' }}>
                                                    SMTP</option>
                                                <option value="sendmail"
                                                    {{ old('mail_type') ?? !empty($setting['mail_type']) ? ($setting['mail_type'] == 'sendmail' ? 'selected' : '') : '' }}>
                                                    Sendmail</option>
                                            </select>
                                            @error('mail_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('admin.Mail Host') }} <x-fill-field /></label>
                                            <input type="text" id="mail_host" name="mail_host"
                                                class="form-control @error('mail_host') is-invalid @enderror"
                                                value="{{ old('mail_host') ?? !empty($setting['mail_host']) ? $setting['mail_host'] : '' }}"
                                                required>
                                            @error('mail_host')
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
                                            <label>{{ __('admin.Mail Username') }} <x-fill-field /></label>
                                            <input type="text" id="mail_username" name="mail_username"
                                                class="form-control @error('mail_username') is-invalid @enderror"
                                                value="{{ old('mail_username') ?? !empty($setting['mail_username']) ? $setting['mail_username'] : '' }}"
                                                required>
                                            @error('mail_username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('admin.Mail Password') }} <x-fill-field /></label>
                                            <input type="text" id="mail_password" name="mail_password"
                                                class="form-control @error('mail_password') is-invalid @enderror"
                                                value="{{ old('mail_password') ?? !empty($setting['mail_password']) ? $setting['mail_password'] : '' }}"
                                                required>
                                            @error('mail_password')
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
                                            <label>{{ __('admin.Mail Encryption') }} <x-fill-field /></label>
                                            <select id="mail_encryption" name="mail_encryption"
                                                class="form-control @error('mail_encryption') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>-- {{ __('admin.Select') }} --
                                                </option>
                                                <option value="ssl"
                                                    {{ old('mail_encryption') ?? !empty($setting['mail_encryption']) ? ($setting['mail_encryption'] == 'ssl' ? 'selected' : '') : '' }}>
                                                    SSL</option>
                                                <option value="tls"
                                                    {{ old('mail_encryption') ?? !empty($setting['mail_encryption']) ? ($setting['mail_encryption'] == 'tls' ? 'selected' : '') : '' }}>
                                                    TLS</option>
                                            </select>
                                            @error('mail_encryption')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('admin.Mail Port') }} <x-fill-field /></label>
                                            <input type="text" id="mail_port" name="mail_port"
                                                class="form-control @error('mail_port') is-invalid @enderror"
                                                value="{{ old('mail_port') ?? !empty($setting['mail_port']) ? $setting['mail_port'] : '' }}"
                                                required>
                                            @error('mail_port')
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
                                            <label>{{ __('admin.Mail From Address') }} <x-fill-field /></label>
                                            <input type="text" id="mail_from_address" name="mail_from_address"
                                                class="form-control @error('mail_from_address') is-invalid @enderror"
                                                value="{{ old('mail_from_address') ?? !empty($setting['mail_from_address']) ? $setting['mail_from_address'] : '' }}"
                                                required>
                                            @error('mail_from_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('admin.Mail From Name') }} <x-fill-field /></label>
                                            <input type="text" id="mail_from_name" name="mail_from_name"
                                                class="form-control @error('mail_from_name') is-invalid @enderror"
                                                value="{{ old('mail_from_name') ?? !empty($setting['mail_from_name']) ? $setting['mail_from_name'] : '' }}"
                                                required>
                                            @error('mail_from_name')
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

                    <div class="tab-pane fade show" id="tab-push-notification-setting" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('admin.Push Notification Setting') }}</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> {{ __('admin.Save Changes') }}
                </button>
            </form>
        </div>
    </div>
@endsection

<x-swal />
